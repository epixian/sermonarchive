<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Live@New Life') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <livewire:styles>
</head>
<body>
    <div id="app" class="min-h-screen bg-gray-100">

    @include('partials.nav')

    @if(Request::is('login') || (Request::is('register')))
        @yield('content')

    @else
        <div class="py-10">
            @if(session('message'))
                @include('partials.message')
            @endif
            <header>
                <div class="flex justify-between max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">
                        @yield('title')
                    </h1>

                    @yield('actions')
                </div>
            </header>
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 py-8 sm:px-0">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    @endif
    </div>

    <livewire:scripts>
</body>
</html>
