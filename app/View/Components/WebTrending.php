<?php

namespace App\View\Components;

use App\Models\TrendingNews;
use Illuminate\View\Component;

class WebTrending extends Component
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
        $trending_news = TrendingNews::select('news_text')->where('status', '1')->get()->toArray();
        return view('components.web-trending', compact('trending_news'));
    }
}
