<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\BlogCategory;
use App\Models\BlogLocation;
use Illuminate\Http\Request;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\TagResource;
use DB;

class BlogController extends Controller
{

    public function getBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->approved()->first();

        return $this->processResponse('blog', new BlogResource($blog));
    }

    public function getBlogAll($slug)
    {
        $blog = Blog::where('slug', $slug)->approved()->first();

        $blog_category = Blog::select('category_id')->where('id',$blog->id)->first();
        $blog_categories = BlogCategory::where('is_deleted', 0)->get();
        $blog_categories_final = BlogCategoryResource::collection($blog_categories);

        $blog_tags = Tag::isActive()->where('is_deleted',false)->withCount('blogs')->whereHas('blogs')->get();

        $stories =   $this->relatedStories($blog_category->category_id, 'categories');

        $popular_posts = Blog::approved()
        ->where('is_deleted', 0)
        ->where('type','!=','global_presence')
        ->orderBy('created_at','asc')
        ->limit(5)->get();


        $all = array(
            'blogs' => $blog,
            'blog_categories' => $blog_categories_final,
            'blog_tags' => $blog_tags,
            'popular_posts' => $popular_posts,
            'blog_category' => $blog_category->category_id ?? null,

        );
        $data = array (
            'stories' => $stories
        );

        return view('blogs.index',compact('all','data'));
    }



    public function latestBlogs(Request $request)
    {
        $search = $request->input('query') ?? '';

        if($search)
        {
            $request->validate([
                'query' => 'required|min:3'
            ]);
        }

        $blogs = Blog::approved()
            ->where('is_deleted', 0)
            ->with(['category'])
            // ->search('name', $search)
            ->where('type','!=','global_presence')
            ->orderBy('created_at','desc')
            ->paginate(4);

        return $this->processResponse('blogs', $blogs);
    }

    public function latestBlogsAll(Request $request)
    {
        $search = $request->input('query') ?? '';

        if($search)
        {
            $request->validate([
                'query' => 'required|min:3'
            ]);
        }

        $blogs = Blog::approved()
            ->where('is_deleted', 0)
            ->with(['category'])
            ->search('name', $search)
            ->where('type','!=','global_presence')
            ->orderBy('created_at','desc')
            ->paginate(10);

        $blog_categories = BlogCategory::where('is_deleted', 0)->get();

        $blog_categories_final = BlogCategoryResource::collection($blog_categories);

        $blog_tags = Tag::isActive()->where('is_deleted',false)->withCount('blogs')->whereHas('blogs')->get();

        $popular_posts = Blog::approved()
        ->where('is_deleted', 0)
        ->where('type','!=','global_presence')
        ->orderBy('created_at','asc')
        ->limit(5)->get();

        $blog_locations = BlogLocation::where('is_deleted', 0)
        ->orderBy('created_at','asc')
        ->limit(5)->get();


        $all = array(
            'blogs' => $blogs,
            'blog_categories' => $blog_categories_final,
            'blog_tags' => $blog_tags,
            'popular_posts' => $popular_posts,
            'blog_locations' => $blog_locations
        );
        //print("<pre>".dd($all,true)."</pre>");
        return view('blogs',compact('all'));
    }

    public function blogCategory($category,$slug)
    {

            $blog = Blog::where('slug', $slug)->approved()->first();

            $blog_category = Blog::select('category_id')->where('id',$blog->id)->first();
            $blog_categories = BlogCategory::all();
            $blog_categories_final = BlogCategoryResource::collection($blog_categories);

            $blog_tags = Tag::isActive()->where('is_deleted',false)->withCount('blogs')->whereHas('blogs')->get();

            $popular_posts = Blog::approved()
            ->where('is_deleted', 0)
            ->where('type','!=','global_presence')
            ->orderBy('created_at','asc')
            ->limit(5)->get();

            $stories =   $this->relatedStories($blog_category->category_id, 'categories');

            $all = array(
                'blogs' => $blog,
                'blog_categories' => $blog_categories_final,
                'blog_tags' => $blog_tags,
                'popular_posts' => $popular_posts,
                'blog_category' => $blog_category->category_id ?? null
            );

            $data = array (
                'stories' => $stories
            );

            return view('blogs.categories.index',compact('all','data'));
    }

    public function blogCategoryAll($slug, $value = null , $type = null)
    {
        $category = BlogCategory::with('blogs')->where('slug',$slug)->where('is_deleted',false)->first();

        $popular_blogs = $category ? Blog::where('category_id',$category->id)->approved()->where('type','!=','global_presence')->where('is_deleted',false)->limit(5)->get() : null;
        $blog_categories_all =  $category ? new BlogCategoryResource($category) : null;

      $stories =   $this->relatedStories($category->id, 'categories');

        $data = array(
            'blog_categories' => $blog_categories_all,
            'popular_blogs' => $popular_blogs,
            'stories' => $stories
        );

        return view('blogs.categories',compact('data'));
    }

    public function blogLocationAll($slug)
    {
        $location = BlogLocation::with('blogs')->where('slug',$slug)->where('is_deleted',false)->first();

        $popular_blogs = $location ? Blog::with('blog_locations')
        ->where(function($query) use ($location){
            $query->whereHas('blog_locations', function ($query) use ($location) {
                $query->where('slug', $location->slug);
            });
        })
        ->approved()->where('is_deleted',false)
        ->limit(5)
        ->get() : null;

        $blog_locations_all =  $location ? $location : null;

        $stories =   $this->relatedStories($location->id, 'blog_locations');

        $data = array(
            'blog_locations' => $blog_locations_all,
            'popular_blogs' => $popular_blogs,
            'stories' => $stories
        );

        return view('blogs.locations',compact('data'));
    }

    public function blogTagAll($slug)
    {
        $tag = Tag::with('blogs')->where('slug',$slug)->isActive()->first();
        $tags_all = new TagResource($tag);

        $popular_blogs = Blog::with('tags')
        ->where(function($query) use ($tag){
            $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('slug', $tag->slug);
            });
        })
        ->approved()->where('is_deleted',false)
        ->limit(5)
        ->get();

        $stories =   $this->relatedStories($tag->id, 'tags');

        $data = array(
            'blog_tags' => $tags_all,
            'popular_blogs' => $popular_blogs,
            'stories' => $stories
        );

        return view('blogs.tags',compact('data'));
    }

    public function blogTag($s)
    {
        $tags = Tag::with('blogs')->where('slug',$s)->isActive()->first();

        return view('blogs.tags.index',['tags' => new TagResource($tags)]);
    }

    public function blogTags(Request $request)
    {
        $tags = Tag::isActive()->where('is_deleted',false)->withCount('blogs')->whereHas('blogs')->get();

        return view('blogs.tags',['tags' => new TagResource($tags)]);
    }

    public function relatedStories($value, $type)
    {

        if($type == 'categories')
        {
            $stories = Blog::with('category')
                    ->where('category_id', $value)
                    ->orderBy('created_at' ,'desc')
                    ->where('is_deleted',false)
                    ->approved()
                    ->limit(3)
                    ->get();
        }
        else if($type == 'tags')
        {
            $stories = Blog::whereHas('tags', function($q) use ($value){
                        $q->where('tags.id', $value);
                    })
                    ->orderBy('created_at' ,'desc')
                    ->where('is_deleted',false)
                    ->approved()
                    ->limit(3)
                    ->get();
        }
        else if($type == 'blog_locations')
        {
            $stories = Blog::whereHas('blog_locations', function($q) use ($value){
                $q->where('blog_locations.id', $value);
            })
            ->orderBy('created_at' ,'desc')
            ->where('is_deleted',false)
            ->approved()
            ->limit(3)
            ->get();
        }
        return ($stories);
    }


}
