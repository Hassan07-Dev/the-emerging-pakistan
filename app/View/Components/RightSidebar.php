<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\View\Component;

class RightSidebar extends Component
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
        $categories = BlogCategory::withCount('blog')->orderBy('blog_count', 'desc')->where('status', 1)->get();
        $blog_latest = Blog::select('id', 'slug', 'blog_image', 'title')->where('status', 1)->latest()->first();
        return view('components.right-sidebar', compact ('categories', 'blog_latest'));
    }
}
