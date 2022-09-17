<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(){
        return view ('blog');
    }

    public function blogDetails($slug){
        $blog_details = Blog::with ('category')->where('slug', $slug)->first();
//        $categories = BlogCategory::where('status', 1)->get()->random(5);
//        $tags = Tag::where('status', 1)->get()->random(7);
//        $latest_blogs = Blog::select('id','blog_image','title','slug','arthur',)->where('status', 1)->latest()->limit(3)->get();
        return view ('blog-details', compact ('blog_details'));
    }

    public function blogList(Request $request){
        try {
            if($request->page_no == 1){
                $number_recent = 0;
            }else if($request->page_no > 1){
                $decrement = $request->page_no - 1;
                $number_recent = $decrement * 6;
            }else{
                $number_recent = 0;
            }
            $inner_number_recent = round(($number_recent/2),0,PHP_ROUND_HALF_DOWN);
            $inner_take = round((6/2),0,PHP_ROUND_HALF_DOWN);

//            dd ($inner_number_recent.'---'.$inner_take);

            $blogs = Blog::where('status', 1) ->skip($inner_number_recent)->take($inner_take)->get();
            if($blogs){
                return sendSuccess ('Data found!', $blogs);
            }
            return sendError ('No blog found!', null);
        } catch (\Exception $e){
            return sendError ('Something went wrong!', $e);
        }
    }

}

