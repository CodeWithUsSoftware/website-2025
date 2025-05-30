<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pricing extends Component
{
    public $topic ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic  = $topic;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pricing');
    }
}
