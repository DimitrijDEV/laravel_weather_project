<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('APP_NAME', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right,#0f0c29, #302b63, #24243e);">
    <div id="app">

        <x-header />

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <x-footer />

    </div>
</body>

<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
<script type="text/javascript">
 
</script>


</html>
