@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div>
            <!-- <img class="mx-auto h-12 w-auto" src="/img/logos/workflow-mark-on-white.svg" alt="Workflow" /> -->
            <h2 class="mt-10 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{ __('Register') }}
            </h2>
            <p class="mt-6 text-gray-700">Sign up for an account and let us know you're here!</p>
            <p class="text-gray-700">Registration enables the following activities:</p>
            <ul class="p-2 text-gray-700 text-sm leading-5 list-inside list-disc">
                <li>Record attendance for you and your family</li>
                <!-- <li>Chat with other members</li> -->
                <li>Submit prayer requests</li>
            </ul>
        </div>
        <form class="mt-8" action="{{ route('register') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true" />
            <div class="rounded-md shadow-sm">
                <p class="text-gray-700 text-sm">Tip: use an email address we already know!</p>
                <div class="mt-1">
                    <input id="name" aria-label="{{ __('Name') }}" name="name" type="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('Name') }}" />
                </div>
                <div class="-mt-px">
                    <input id="email" aria-label="{{ __('E-Mail Address') }}" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('E-Mail Address') }}" />
                </div>
                <div class="-mt-px">
                    <input id="password" aria-label="{{ __('Password') }}" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('Password') }}" required autocomplete="new-password"/>
                </div>
                <div class="-mt-px">
                    <input id="password-confirm" aria-label="{{ __('Confirm Password') }}" name="password_confirmation" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password"/>
                </div>
            </div>
            @error('name')
            <span class="text-red-600 sm:text-sm sm:leading-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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

            <div class="mt-6">
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-600 hover:bg-nl-green-500 focus:outline-none focus:border-nl-green-700 focus:shadow-outline-nl-green active:bg-nl-green-700 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-nl-green-500 group-hover:text-nl-green-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        <div class="mt-4 text-sm leading-5">
            Already have an account?
            <a href="/login" class="font-medium text-nl-blue-600 hover:text-nl-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ __('Login') }}
            </a>
            instead.
        </div>
    </div>
</div>
@endsection
