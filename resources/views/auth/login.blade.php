@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex-1 flex flex-col items-center justify-center">
        <div>
            <!-- <img class="mx-auto h-12 w-auto" src="/img/logos/workflow-mark-on-white.svg" alt="Workflow" /> -->
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Login
            </h2>
            <div class="flex flex-col max-w-md md:max-w-2xl w-full">
                <p class="font-serif md:-ml-10 text-6xl text-gray-200 text-left">&#8220;</p>
                <p class="-mt-12 text-center text-gray-700 text-2xl leading-7">Fill out the black pad as it comes down your row.</p>
                <p class="-mt-6 md:-mr-10 font-serif text-right text-6xl text-gray-200">&#8221;</p>
                <p class="-mt-12 text-right text-sm leading-5">-someone at New Life, probably</p>
            </div>
        </div>

        <div class="max-w-md w-full">
            <form class="mt-8" action="{{ route('login') }}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm">
                    <div>
                        <input aria-label="{{ __('E-Mail Address') }}" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('E-Mail Address') }}" />
                    </div>
                    <div class="-mt-px">
                        <input aria-label="{{ __('Password') }}" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('Password') }}" />
                    </div>
                </div>
                @error('email')
                <span class="text-red-600 sm:text-sm sm:leading-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('password')
                <span class="text-red-600 sm:text-sm sm:leading-5" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="mt-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-nl-green-600 transition duration-150 ease-in-out" />
                        <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
    <!--
                    <div class="text-sm leading-5">
                        <a href="#" class="font-medium text-nl-green-600 hover:text-nl-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
    -->
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-600 hover:bg-nl-green-500 focus:outline-none focus:border-nl-green-700 focus:shadow-outline-nl-green active:bg-nl-green-700 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-nl-green-500 group-hover:text-nl-green-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
            <div class="mt-4 text-sm leading-5">
                Don't have an account?
                <a href="/register" class="font-medium text-nl-blue-600 hover:text-nl-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('Register') }}
                </a>
                for one!
            </div>
        </div>
    </div>
    <div class="w-full">
        <h4 class="mt-8 font-medium text-left text-sm leading-5">
            Why is this necessary?
        </h4>
        <div class="mt-2 text-xs">
            Simply put, this enables us to recognize you, and enables you to record attendance for you and any family members without
            compromising the security and integrity of our attendance data, or the privacy of our other church members.
        </div>
        <div class="mt-2 text-xs">
            This website links with our online church management software, Breeze.  While our welcome staff can see everyone and check
            in anyone, it would not be right to give those same abilities to anyone with a valid email address.  Logging in with an
            email address we recognize allows you to record attendance for you and any family members, and not anyone else in the church.
        </div>
    </div>
</div>
@endsection
