@extends('layouts.app')

@section('notification')
    @can('record_attendance')
    @if(! request()->hasCookie('nlg-live-attendance-recorded'))
    <record-attendance id="attendance"></record-attendance>
    @endif
    @endcan
@endsection

@section('title', Carbon\Carbon::parse($service->service_date, config('sermonarchive.event_timezone'))->toFormattedDateString())

@section('subtitle', $service->name)

@section('actions')
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 lg:flex lg:items-start">
    <div id="videoplayer" class="lg:flex-1">
        <video-player :sermon="{{ $service->sermon }}" scheduled-for="{{ $service->service_datetime }}" description="false"></video-player>

        <div class="mt-4 text-sm px-4 sm:px-0">
            {!! str_replace("\n", '<br />', $service->description) !!}
        </div>
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
