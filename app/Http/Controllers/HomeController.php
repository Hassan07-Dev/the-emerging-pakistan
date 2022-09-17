<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ClientTestimonials;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = BlogCategory::withCount('blog')->orderBy('blog_count', 'desc')->where('status', 1)->get();
        return view ('index', compact ('categories'));
    }
}
