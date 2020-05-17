@extends('layouts.app')

@section('title', $sermon->name)

@section('actions')
<div class="flex items-center space-x-2">

    @can('edit_sermons')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="{{ $sermon->path() }}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
        Edit Sermon
      </a>
    </span>
    @endcan

</div>
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <video-js id="my-video" class="video-js vjs-big-play-centered h-full" controls autoplay preload="none" data-setup='{ "liveui": true }'>
        <source src="https://stream.newlifeglenside.com/recordings/{{ $sermon->stream_key }}.mp4" type="video/mp4">
        <!-- <source src="https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8" type="application/vnd.apple.mpegurl"> -->
        <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
    </video-js>
</div>

<div class="sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <h2 class="text-xl font-bold leading-tight text-gray-900">{{ $sermon->name }}</h2>
    <div class="text-base text-gray-900">
        {{ $sermon->description }}
    </div>
</div>

<link href="https://vjs.zencdn.net/7.7.6/video-js.min.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/7.7.6/video.min.js"></script>
@endsection
