<div class="weather-info text-center text-light py-3 mt-4" style="background-color: #58557d">
    <h2 class="mb-2 text-light">{{ $city['name'] }}, {{ $city['country'] }}</h2>
    <h1 class="my-3 text-ligt">{{ (int) ($weather->temp - 273.15) }} <span>&#8451;</span></h1>

    <x-weather-icon :weather="$weather" />
    
    <h3>{{ $weather->weather[0]->main }}</h3>
    <h5 class="my-3">{{ date('l, h:i A', $weather->dt) }}</h5>

    <div class="d-flex justify-content-center">
        <p class="mr-4">Wind {{ $weather->wind_speed }} m/s</p>
        <p>Pressure {{ $weather->pressure }} hPa</p>
    </div>
    <div class="d-flex justify-content-center">
        <p class="mr-4">Humidity {{ $weather->humidity }}%</p>
        <p>Cloudness {{ $weather->clouds }}%</p>
    </div>
</div>
