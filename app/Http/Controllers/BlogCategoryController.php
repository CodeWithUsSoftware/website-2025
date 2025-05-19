<?php

namespace App\Http\Controllers;
use App\Models\BlogCategory;
use App\Http\Resources\BlogCategoryResource;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
     public function blogCategories()
    {
        $blogs = BlogCategory::all();

        return view('categories.index',['categories' => BlogCategoryResource::collection($blogs)]);
    }
}
