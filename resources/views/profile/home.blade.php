@extends('layouts.app')

@section('content')
    <form action="{{ route('cities') }}" method="get" class="mt-5" id="search-city">
        @csrf
        @method('get')
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Search for a city" aria-label="Search for a city"
                aria-describedby="basic-addon2" name="city" value={{ old('city') }}>
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit" onclick="getCity(event)">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="d-flex">
        @error('city')
            <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
        @enderror

        @if (sizeof($cities) > 0)
            <form id="select-city" action="{{ route('weather') }}" class="my-3 ml-auto" method="get">
                @csrf
                @method('get')
                <select name="id" class="form-select" aria-label="Default select example" onchange="getWeather(event)">
                    <option selected>Select a city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city['id'] }}">
                            {{ $city['name'] }}, {{ $city['country'] }}
                        </option>
                    @endforeach
                </select>
            </form>
        @endif
    </div>

    @if ($city !== null && $weather !== null)
        <x-weather-info :weather="$weather->current" :city="$city" />

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
    @elseif (sizeof($cities) === 0)
        <div class="weather-info text-center text-light py-3 mt-4" style="background-color: #58557d">
            <i class="bi bi-cloud-sun" style="font-size: 120px"></i>
            <h5>You need to find a city if you wish to know a weather!</h5>
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
