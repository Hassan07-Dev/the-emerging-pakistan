<?php

namespace App\View\Components;

use App\Models\BlogCategory;
use App\Models\Logo;
use Illuminate\View\Component;

class WebHeader extends Component
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
        $latest_news = BlogCategory::where('category_name', 'Latest News')->with(['blog'=>function($q){
                $q->where('status', 1);
                $q->orderBy('created_at', 'DESC');
                $q->limit(6);
            }])
            ->where('status', 1)->first();
         return view('components.web-header', compact ('logo', 'latest_news'));
    }
}
