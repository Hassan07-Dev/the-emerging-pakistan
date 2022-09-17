<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\Logo;
use Illuminate\View\Component;

class WebFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $logo = Logo::where('id', 1)->first();
        $blog_list = Blog::where('status', 1)->get()->random(3);
        return view('components.web-footer', compact ('logo','blog_list'));

    }
}
