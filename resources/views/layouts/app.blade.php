<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167404296-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-167404296-1');
    </script>

    <!-- Hotjar Tracking Code for https://live.newlifeglenside.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1823590,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Live@New Life') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="min-h-screen bg-gray-100">

    @if(Request::is('login') || (Request::is('register')))
        @yield('content')

    @else
        @include('partials.nav')

        @yield('notification')

        @if(session('message'))
            @include('partials.message')
        @endif

        <div class="pt-6 pb-10">
            <header>
                <div class="md:flex items-start justify-between max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div>
                        <h1 class="text-3xl font-bold leading-tight text-gray-900">
                            @yield('title')
                        </h1>
                        <div class="font-medium text-gray-700">
                            @yield('subtitle')
                        </div>
                    </div>
                    <div class="flex-shrink-0 mt-4 md:mt-0 flex items-center space-x-2">
                        @yield('actions')
                    </div>
                </div>
            </header>
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 py-6 sm:px-0">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    @endif
    </div>

    <link href="https://vjs.zencdn.net/7.7.6/video-js.min.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.7.6/video.min.js"></script>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
