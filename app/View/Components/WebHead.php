<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class WebHead extends Component
{
    /**
     * @var
     */
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $page = "";
        if(Route::currentRouteName() == "home.index"){
            $page = 'home_page';
        } elseif (Route::currentRouteName() == "blog.index"){
            $page = 'blog_page';
        } elseif (Route::currentRouteName() == "about.index"){
            $page = 'about_page';
        } elseif (Route::currentRouteName() == "blog.categoryListx"){
            $page = 'category_page';
        } elseif (Route::currentRouteName() == "contactUs.index"){
            $page = 'contact_page';
        } elseif (Route::currentRouteName() == "blog.writeBlog"){
            $page = 'user_blog_page';
        } elseif (Route::currentRouteName() == "profile.setting"){
            $page = 'profile_page';
        } elseif (Route::currentRouteName() == "user.login"){
            $page = 'login_page';
        } elseif (Route::currentRouteName() == "user.signup"){
            $page = 'signup_page';
        } elseif (Route::currentRouteName() == "user.forgot.password"){
            $page = 'forget_password_page';
        }
        $meta = Page::where('page_name', $page)->first();
//        dd($meta);
        return view('components.web-head', compact('meta'));
    }
}
