<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
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
        $categories = BlogCategory::withCount('blog')->orderBy('blog_count', 'desc')->where('status', 1)->take(10)->get();
        $travels = BlogCategory::where('category_name', 'Travel')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(4);
            }])
            ->where('status', 1)->first();
        $sports = BlogCategory::where('category_name', 'Sport')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(4);
            }])
            ->where('status', 1)->first();
        $tags = BlogTag::with('getTags')->groupBy('tag_id')
            ->selectRaw('count(*) as count, tag_id')
            ->orderBy('count', 'DESC')
            ->take(12)->get();
        return view('components.right-sidebar', compact ('categories', 'travels', 'sports', 'tags'));
    }
}
