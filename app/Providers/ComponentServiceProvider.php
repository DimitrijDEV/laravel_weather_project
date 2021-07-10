<?php

namespace App\Providers;

use App\View\Components\Header;
use App\View\Components\WeatherCard;
use App\View\Components\WeatherIcon;
use App\View\Components\WeatherInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('header', Header::class);
        Blade::component('footer', Footer::class);
        Blade::component('weather-card', WeatherCard::class);
        Blade::component('weather-info', WeatherInfo::class);
        Blade::component('weather-icon', WeatherIcon::class);
    }
}
