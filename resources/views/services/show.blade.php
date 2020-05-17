@extends('layouts.app')

@section('title', $service->name)

@section('subtitle', Carbon\Carbon::parse($service->service_date)->toFormattedDateString())

@section('actions')
<div class="flex items-center space-x-2">

    @can('edit_services')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="{{ $service->path() }}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-600 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        Edit Service
      </a>
    </span>
    @endcan

    @can('edit_sermons')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="{{ $service->path() }}/sermons/create" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-600 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Add Sermon
      </a>
    </span>
    @endcan

</div>
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 grid grid-cols-2 gap-4">
    @foreach ($service->sermons as $sermon)
    <video-js id="my-video" class="video-js vjs-big-play-centered h-full" controls autoplay preload="none" data-setup='{ "liveui": true }'>
        <source src="https://stream.newlifeglenside.com/recordings/{{ $sermon->stream_key }}.flv" type="video/flv">
        <source src="https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8" type="application/vnd.apple.mpegurl">
        <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
    </video-js>

    <div class="">
        <h2 class="text-xl font-bold leading-tight text-gray-900">{{ $sermon->name }}</h2>
        <div class="text-base text-gray-900">
            {{ $sermon->speaker->full_name }}
        </div>
        <div class="text-base text-gray-900">
            Stream key: {{ $sermon->stream_key }}
        </div>
        <div class="text-base text-gray-900">
            {{ $sermon->description }}
        </div>
    </div>
    @endforeach
</div>

<link href="https://vjs.zencdn.net/7.7.6/video-js.min.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.min.js"></script>
@endsection
