<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StudentSpotLight extends Component
{
    public $studentSpotLights;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($studentSpotLights)
    {
        $this->studentSpotLights  = $studentSpotLights;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student-spot-light');
    }
}
