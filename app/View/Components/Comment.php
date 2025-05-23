<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comment extends Component
{
    public  $topicResource;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topicResource)
    {
        $this->topicResource  = $topicResource;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment');
    }
}
