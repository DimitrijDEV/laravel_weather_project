<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WeatherIcon extends Component
{
    public $weather, $style;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($weather, $style = "width: 70px; height: 70px")
    {
        $this->weather = $weather;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather-icon');
    }
}
