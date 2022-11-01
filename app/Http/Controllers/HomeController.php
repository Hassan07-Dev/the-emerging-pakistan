<?php

namespace App\Http\Controllers;

use App\HelpersFunction\Constants;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\City;
use App\Models\ClientTestimonials;
use App\Models\Country;
use App\Models\Services;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = BlogCategory::with('blog')->withCount('blog')
            ->orderBy('blog_count', 'desc')
            ->where('status', 1)->get();
        $latest_news = BlogCategory::where('category_name', 'Latest News')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(6);
            }])
            ->where('status', 1)->first();
        $technologys = BlogCategory::where('category_name', 'Technology')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(6);
            }])
            ->where('status', 1)->first();
        $bussiness = BlogCategory::where('category_name', 'Bussiness')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(6);
            }])
            ->where('status', 1)->first();
        $fashions = BlogCategory::where('category_name', 'Fashion')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(6);
            }])
            ->where('status', 1)->first();
        $latest_blogs = Blog::with('category')->where('status', 1)->latest()->paginate(10);
        return view ('index', compact ('categories', 'latest_news', 'technologys', 'bussiness', 'fashions', 'latest_blogs' ));
    }
}
