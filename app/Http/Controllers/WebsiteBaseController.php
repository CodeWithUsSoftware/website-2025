<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SchoolPage;
use App\Models\Referral;
use App\Http\Controllers\Controller;
use App\Models\LandingPageCategory;
use App\Models\Tag;
use App\Models\Timezone;
use App\Models\HowToVideos;
use Illuminate\Support\Facades\Config;
use App\Models\Project;

class WebsiteBaseController extends Controller
{
     public function initialWebsiteData(Request $request)
    {
        $translations = new LanguageLineController;
        $localizedStrings = $translations->get();

        $timezone = $request->input('timezone');
        $zone = Timezone::where('time_zone', $timezone)->first();

        if($zone) {
            $tz = $zone->country;
        } else {
            $tz = Country::first();
        }

        $blogs = Blog::approved()
        ->with(['category'])
        ->where('is_deleted', 0)
        ->where('type','!=','global_presence')
        ->orderBy('created_at','desc')
        ->limit(5)
        ->get();

        $country_names = SchoolPage::where('status','active')->get();

        $referral_links = Referral::where('is_deleted',false)->where('status','active')->get();

        $blog_categories = BlogCategory::where('is_deleted',false)->limit(3)->get();

        $landing_page_category_links = LandingPageCategory::where('is_deleted', 0)->get();
        $projects =  Project::select('id','user_id','is_public','save_as','language','meta_title')->where('is_deleted',false)->where('is_public',true)->get();
        $projectsLanguages = [];
        foreach ($projects as $key=>$project) {
            if (!isset($projectsLanguages[$project->language])) {
                $projectsLanguages[$project->language] = [];
            }
            $projectsLanguages[$project->language][$key]['id'] = $project->id;
            $projectsLanguages[$project->language][$key]['user_id'] = $project->user_id;
            $projectsLanguages[$project->language][$key]['is_public'] = $project->is_public;
            $projectsLanguages[$project->language][$key]['save_as'] = $project->save_as;
            $projectsLanguages[$project->language][$key]['language'] = $project->language;
            $projectsLanguages[$project->language][$key]['meta_title'] = $project->meta_title;
        }

        $all = array(
                'translations' => $localizedStrings,
                'country' => $tz,
                'blogs'=> $blogs,
                'blog_categories' => $blog_categories,
                'landing_page_category_links' => $landing_page_category_links,
                'referral_links' => $referral_links,
                'country_names' => $country_names,
                'projects' => $projectsLanguages,
        );

        return view('sitemap',compact('all'));
    }

    public function howToVideos()
    {
        $how_to_videos = HowToVideos::all();
        return view('how_to_videos',compact('how_to_videos'));
    }
}
