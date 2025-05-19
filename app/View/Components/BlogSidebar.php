<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogSidebar extends Component
{

    public $all ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($all)
    {
        $this->all  = $all;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-sidebar');
    }
}
