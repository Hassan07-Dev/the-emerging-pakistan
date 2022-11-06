<?php

namespace App\View\Components;

use App\Models\Comment;
use Illuminate\View\Component;

class AdminSidebar extends Component
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
        $commentCount = Comment::where('approval', '0')->count();
        return view('components.admin-sidebar', compact('commentCount'));
    }
}
