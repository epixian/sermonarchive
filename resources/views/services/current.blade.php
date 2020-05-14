@extends('layouts.app')

@section('title', $service->name)

@section('subtitle', Carbon\Carbon::parse($service->service_date)->toFormattedDateString())

@section('actions')
    {{-- @if (auth()->user()->checkedIn($service))
    <span class="inline-flex rounded-md shadow-sm">
      <span class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-500 bg-white transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Already Checked In
      </span>
    </span> --}}
    {{--  @else --}}
    <span class="inline-flex rounded-md shadow-sm">
      <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        Check In
      </span>
    </span>
    {{-- @endif  --}}
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 grid grid-cols-2 gap-4">
    <div>
        @foreach ($service->sermons as $sermon)
        <div>
            <video-js id="my-video" class="video-js vjs-big-play-centered h-full" controls autoplay preload="none" data-setup='{ "liveui": true }'>
                <source src="https://stream.newlifeglenside.com/recordings/{{ $sermon->stream_key }}.flv" type="video/flv">
                <source src="https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8" type="application/vnd.apple.mpegurl">
                <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
            </video-js>

            <div class="mt-2">
                <h2 class="text-xl font-bold leading-tight text-gray-900">{{ $sermon->name }}</h2>
                <div class="text-base text-gray-900">
                    {{ $sermon->description }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<link href="https://vjs.zencdn.net/7.7.6/video-js.min.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.min.js"></script>
@endsection
