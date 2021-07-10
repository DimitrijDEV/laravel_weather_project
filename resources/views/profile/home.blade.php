@extends('layouts.app')

@section('content')
    <form action="{{ route('cities') }}" method="POST" class="mt-5" id="search-city">
        @csrf
        @method('post')
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Search for a city" aria-label="Search for a city"
                aria-describedby="basic-addon2" name="city" value={{ old('city') }}>
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit" onclick="getCity(event)">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        @error('city')
            <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
        @enderror
    </form>

    @if (sizeof($cities) > 0)
        <form id="select-city" action="{{ route('weather') }}" class="my-3 d-flex justify-content-end" method="post">
            @csrf
            @method('post')
            <select name="id" class="form-select" aria-label="Default select example" onchange="getWeather(event)">
                <option selected>Select a city</option>
                @foreach ($cities as $city)
                    <option value="{{ $city['id'] }}">
                        {{ $city['name'] }}
                    </option>
                @endforeach
            </select>
        </form>
    @endif

    @if ($city !== null && $weather !== null)
        <div class="weather-info text-center text-light py-3 mt-4" style="background-color: #58557d">
            <h2 class="mb-2 text-light">{{ $city['name'] }}, {{ $city['country'] }}</h2>
            <h1 class="my-3 text-ligt">{{ (int) ($weather->current->temp - 273.15) }} <span>&#8451;</span></h1>
            <div id="icon">
                <img id="wicon" style="width: 70px; height: 70px"
                    src="{{ 'http://openweathermap.org/img/w/' . $weather->current->weather[0]->icon . '.png' }}"
                    alt="Weather icon" />
            </div>
            <h3>{{ $weather->current->weather[0]->main }}</h3>
            <h5 class="my-3">{{ date('l, h:i A', $weather->current->dt) }}</h5>

            <div class="d-flex justify-content-center">
                <p class="mr-4">Wind {{ $weather->current->wind_speed }} m/s</p>
                <p>Pressure {{ $weather->current->pressure }} hPa</p>
            </div>
            <div class="d-flex justify-content-center">
                <p class="mr-4">Humidity {{ $weather->current->humidity }}%</p>
                <p>Cloudness {{ $weather->current->clouds }}%</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-weather-card :weather="$weather->daily[1]" />
            </div>
            <div class="col">
                <x-weather-card :weather="$weather->daily[2]" />
            </div>
            <div class="col">
                <x-weather-card :weather="$weather->daily[3]" />
            </div>
            <div class="col">
                <x-weather-card :weather="$weather->daily[4]" />
            </div>
        </div>

    @endif

    <script>
        function getCity(event) {
            event.preventDefault();
            document.getElementById('search-city').submit();
        }

        function getWeather(event) {
            event.preventDefault();
            document.getElementById('select-city').submit();
        }
    </script>
@endsection
