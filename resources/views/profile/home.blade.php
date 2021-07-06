@extends('layouts.app')

@section('content')
    <form action="{{ route('cities') }}" method="POST" class="mt-5">
        @csrf
        @method('post')

        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="Search for a city" aria-label="Search for a city"
                aria-describedby="basic-addon2" name="city" value={{ old('city') }}>
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </div>
        @error('city')
            <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
        @enderror
    </form>

    @if (sizeof($cities) > 0)
        <select class="form-select my-3 d-block ml-auto" aria-label="Default select example">
            <option selected>Select a city</option>
            @foreach ($cities as $city)
                <option value="{{ $city['id'] }}">
                    {{ $city['name'] }}
                </option>
            @endforeach
        </select>
    @endif

    <div class="weather-info text-center text-light py-3 mt-2" style="background-color: #58557d">
        <h3 class="mb-2">Rzeszów</h3>
        <h2 class="mb-2">23C</h2>

    </div>
@endsection
