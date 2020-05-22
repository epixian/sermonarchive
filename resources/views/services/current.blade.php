@extends('layouts.app')

@section('notification')
    @can('record_attendance')
    @if(! request()->hasCookie('nlg-live-attendance-recorded'))
    <record-attendance id="attendance"></record-attendance>
    @endif
    @endcan
@endsection

@section('title', Carbon\Carbon::parse($service->service_date, 'America/New_York')->toFormattedDateString())

@section('subtitle', $service->name)

@section('actions')
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 lg:flex lg:items-start">
    <div id="videoplayer" class="lg:flex-1">
        @foreach ($service->sermons as $sermon)
        <video-player :sermon='{!! $sermon->toJson() !!}' />
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
