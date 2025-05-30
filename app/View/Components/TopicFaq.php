<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicFaq extends Component
{

    public  $topicResource, $color,$name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topicResource,$color,$name)
    {

        $this->topicResource  = $topicResource;
        $this->color  = $color;
        $this->name  = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topic-faq');
    }
}
