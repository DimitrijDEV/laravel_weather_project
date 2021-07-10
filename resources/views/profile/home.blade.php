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
            <h2 class="mb-2 text-light">{{  $city['name'] }}</h2>
            <h2 class="mb-2 text-ligt"></h2>
            <pre class="text-light">{{ var_dump($weather) }}</pre>
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
