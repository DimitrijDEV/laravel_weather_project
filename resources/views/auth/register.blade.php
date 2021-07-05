@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5">Register Page</h1>

    <form action="{{ route('auth.create-user') }}" method="POST" class="mx-auto" style="width:500px;">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter your name" name="username" value="{{ old('username') }}">

            @error('name')
                <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="email" {{ old('email') }}>

            @error('email')
                <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">

            @error('password')
                <p class="pl-2 pt-1 text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Repeat password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repeat password"
                name="repeat-password">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
@endsection
