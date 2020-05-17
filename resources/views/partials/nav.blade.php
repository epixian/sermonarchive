<nav x-data="{ menuOpen: false }" class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <!-- <img class="block lg:hidden h-8 w-auto" src="/img/logos/workflow-mark-on-white.svg" alt="Workflow logo" /> -->
                    <!-- <img class="hidden lg:block h-8 w-auto" src="/img/logos/workflow-logo-on-white.svg" alt="Workflow logo" /> -->
                    <a href="/">
                        <img class="hidden sm:block lg:hidden h-12 w-auto" src="https://cdn.newlifeglenside.com/leaf.png" alt="New Life logo" />
                        <img class="block sm:hidden lg:block h-12 w-auto" src="https://cdn.newlifeglenside.com/nlg-logo.png" alt="New Life logo" />
                        <!-- <span class="text-3xl font-bold leading-tight text-gray-900">{{ config('app.name', 'Live @ New Life') }}</span> -->
                    </a>
                </div>
                <div class="hidden sm:ml-8 sm:flex space-x-8">
                    <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('/') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                        Live
                    </a>

                    @can('edit_services')
                    <a href="/admin/services" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('services') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                        Services
                    </a>
                    @endcan

                    @can('edit_sermons')
                    <a href="/sermons" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('sermons') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                        Sermons
                    </a>
                    @endcan

                    @can('edit_users')
                    <a href="/admin/users" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('services') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                        Users
                    </a>
                    @endcan
                </div>
            </div>

            <div class="flex">
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                     <span class="rounded-md shadow-sm">
                        <a href="https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Give
                        </a>
                    </span>
                </div>

                @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
    <!--
                    <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out" aria-label="Notifications">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
     -->

                    <!-- Profile dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <div>
                            <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
                                <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->gravatar_url() }}" alt="" />
                            </button>
                        </div>

                        <div x-cloak x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                            <div @click.away="open = false" class="pb-1 rounded-md bg-white shadow-xs">
                                <div class="bg-gray-50 border-b border-gray-200">
                                    <div class="px-4 pt-3 text-sm font-medium leading-5 text-gray-700">{{ auth()->user()->name }}</div>
                                    <div class="px-4 pb-2 text-sm leading-5 text-gray-700">{{ auth()->user()->email }}</div>
                                    @if (auth()->user()->breeze_id)
                                    <div class="flex items-center px-4 py-2 bg-nl-blue-100 text-sm text-nl-blue-500">
                                        <svg class="h-5 w-5 mr-1 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                        Verified
                                    </div>
                                    @endif
                                </div>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">{{ __('Logout') }}</a>

                            </div>
                        </div>
                    </div>
                </div>
                @else
<!--                     @if (Route::has('login'))
                    <div class="hidden sm:ml-6 sm:flex space-x-8">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('login') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                            {{ __('Login') }}
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ Request::is('register') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300' }}">
                            {{ __('Register') }}
                        </a>
                        @endif
                    </div>
                    @endif -->
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="menuOpen = !menuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" :class="{ 'hidden': menuOpen, 'block': !menuOpen }" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" :class="{ 'block': menuOpen, 'hidden': !menuOpen }" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="menuOpen" @click.away="menuOpen = false" class="hidden sm:hidden" :class="{ 'block': menuOpen, 'hidden': !menuOpen }">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ Request::is('/') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300' }}">Live</a>

            @can('edit_services')
            <a href="/admin/services" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ Request::is('admin/services') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300' }}">Services</a>
            @endcan

            @can('edit_sermons')
            <a href="/sermons" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ Request::is('sermons') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300' }}">Sermons</a>
            @endcan

            @can('edit_users')
            <a href="/admin/users" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out {{ Request::is('admin/users') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300' }}">Users</a>
            @endcan

        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            @auth
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->gravatar_url() }}" alt="" />
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-6 text-gray-800">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="inline-flex text-sm font-medium leading-5 text-gray-500">
                        {{ auth()->user()->email }}
                        @if (auth()->user()->breeze_id)
                        <span class="inline-flex items-center text-nl-blue-500 ml-2">
                            <svg class="h-6 w-6 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            Verified
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-3 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <!-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Your Profile</a> -->
                <!-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Settings</a> -->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">{{ __('Logout') }}</a>
            </div>
            @else
<!--             <div class="mt-3 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">{{ __('Register') }}</a>
            </div> -->
            @endauth
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</nav>
