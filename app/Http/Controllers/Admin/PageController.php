<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){
        return view('admin.pages.page');
    }

    public function fetchPageData(Request $request){
        $validator = Validator::make($request->all(), [
            'page_name'	=> 'required|in:home_page,about_page,blog_page,category_page,contact_page,profile_page,user_blog_page'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $pageData = Page::where('page_name', $request->page_name)->first();

        if(!$pageData){
            return sendError ('No data found...!!!', null);
        }
        return sendSuccess('Data Found!', $pageData);
    }

    public function pageDataUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'page_name'	=> 'required|in:home_page,about_page,blog_page,category_page,contact_page,profile_page,user_blog_page',
            'meta_title'	=> 'required|max:255',
            'meta_description'	=> 'required|max:255',
            'meta_keywords'	=> 'required',
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $pageUpdate = Page::updateorcreate([
            'page_name' => $request->page_name,
        ],[
            'page_name' => $request->page_name,
            'title' => $request->meta_title,
            'description' => $request->meta_description,
            'keywords' => $request->meta_keywords,
        ]);

        if($pageUpdate){
            return sendSuccess ('Data Updated Successfully', null);
        }
        return sendError ('Something went wrong...!!!', null);
    }
}
