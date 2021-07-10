<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WeatherInfo extends Component
{
    public $weather, $city;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($weather, $city)
    {
        $this->weather = $weather;
        $this->city = $city;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather-info');
    }
}
