<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WeatherCard extends Component
{
    public $weather;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($weather)
    {
        $this->weather = $weather;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather-card');
    }
}
