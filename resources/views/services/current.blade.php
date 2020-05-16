@extends('layouts.app')

@section('notification')
    @can('record-attendance')
    <record-attendance id="attendance"></record-attendance>
    @endcan
@endsection

@section('title', Carbon\Carbon::parse($service->service_date)->toFormattedDateString())

@section('subtitle', $service->name)

@section('actions')
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 lg:flex lg:items-start">
    <div class="lg:flex-1">
        @foreach ($service->sermons as $sermon)
        <div>
            <video-js id="my-video" class="video-js vjs-big-play-centered h-full" controls autoplay preload="none" data-setup='{ "liveui": true }'>
                <source src="https://stream.newlifeglenside.com/recordings/{{ $sermon->stream_key }}.flv" type="video/flv">
                <source src="https://stream.newlifeglenside.com/recordings/{{ $sermon->stream_key }}.mp4" type="video/mp4">
                <source src="https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8" type="application/vnd.apple.mpegurl">
                <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
            </video-js>

            <div class="mt-2 mx-4 sm:mx-0">
                <h2 class="text-lg font-bold leading-tight text-gray-900">{{ $sermon->name }}</h2>
                <div class="text-base text-gray-900">
                    {{ $sermon->description }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @can('participate')
<!--
    <div id="chat" class="flex flex-col h-64 w-full lg:w-1/3 lg:ml-4">
        <chat-messages class="flex-1" :messages="messages" class="w-full h-64"></chat-messages>
        <chat-input v-on:message-sent="addMessage" :service="{{ $service->id }}" :user="{{ auth()->user() }}"></chat-input>
    </div>
-->
    @endcan
</div>
@endsection
