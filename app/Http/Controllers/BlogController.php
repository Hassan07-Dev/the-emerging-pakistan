<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::where('status', 1)->paginate(6);
        return view ('blog', compact ('blogs'));
    }

    public function test($slug){
        $blog_details = Blog::where('slug', $slug)->first();
        $categories = BlogCategory::where('status', 1)->get()->random(5);
        $tags = Tag::where('status', 1)->get()->random(7);
        $latest_blogs = Blog::select('id','blog_image','title','slug','arthur',)->where('status', 1)->latest()->limit(3)->get();
        return view ('blog-details', compact ('blog_details', 'categories', 'tags', 'latest_blogs'));
    }
}

