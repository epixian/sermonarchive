@extends('layouts.app')

@section('title', $service->name)

@section('subtitle', Carbon\Carbon::parse($service->service_date)->toFormattedDateString())

@section('actions')
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
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div id="videoplayer">

        @foreach ($service->sermons as $sermon)
        <div class="sm:grid grid-cols-2 gap-4">
            <div>
                <h3 class="font-medium text-xl text-center">Preview</h3>
                <video-player class="mt-2" :sermon='{!! $sermon->toJson() !!}' mode="preview" control description="false"></video-player>
            </div>
            <div>
                <h3 class="font-medium text-xl text-center">Live</h3>
                <video-player class="mt-2" :sermon='{!! $sermon->toJson() !!}' mode="live" control description="false"></video-player>
            </div>
        </div>

        <div class="sm:mx-0 sm:grid grid-cols-2 gap-4 border-t border-gray-300 mt-4">
            <div class="mt-4 space-y-2">
                <div class="flex items-start sm:items-center justify-between">
                    <h2 class="text-xl font-bold leading-tight text-gray-900">{{ $sermon->name }}</h2>
                    <span class="flex rounded-md shadow-sm">
                      <a href="/admin{{ $sermon->path() }}/edit" class="inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150 border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Edit
                      </a>
                    </span>
                </div>
                <div class="text-base text-gray-900 space-y-1">
                    <p>{{ $sermon->speaker->full_name }}</p>
                    <p>{{ $sermon->description }}</p>
                    <p>Scheduled at: {{ $sermon->scheduled_time }}</p>
                </div>
            </div>
            <div class="mt-4 text-base text-gray-900 space-y-1">
                <p class="text-right">Stream key: {{ $sermon->stream_key }}</p>
                <stream-controller :sermon='{!! $sermon->toJson() !!}'></stream-controller>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
