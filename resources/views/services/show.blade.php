@extends('layouts.app')

@section('title', $service->name)

@section('subtitle', Carbon\Carbon::parse($service->service_date)->toFormattedDateString())

@section('actions')
  @if($service->sermon)
  <span class="inline-flex rounded-md shadow-sm">
    <a href="/admin{{ $service->sermon->path() }}/edit" class="inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
      <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
      Edit Sermon
    </a>
  </span>
  @else
  <span class="inline-flex rounded-md shadow-sm">
    <a href="/admin{{ $service->path() }}/sermon/create" class="inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
      <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
      Add Sermon
    </a>
  </span>
  @endif

  <span class="inline-flex rounded-md shadow-sm">
    <a href="{{ '/admin'.$service->path() }}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-600 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150">
      <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
      Edit Service
    </a>
  </span>
@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    @if($service->sermon)
    <div id="videoplayer">
        <div class="sm:grid grid-cols-2 gap-4">
            <div>
                <h3 class="font-medium text-xl text-center">Preview</h3>
                <video-player class="mt-2" :sermon='{{ $service->sermon }}' scheduled-for="{{ $service->service_datetime }}" mode="preview" control description="false"></video-player>
            </div>
            <div>
                <h3 class="font-medium text-xl text-center">Live</h3>
                <video-player class="mt-2" :sermon='{{ $service->sermon }}' scheduled-for="{{ $service->service_datetime }}" mode="live" control description="false"></video-player>
            </div>
        </div>

        <div class="sm:mx-0 sm:grid grid-cols-2 gap-4 border-t border-gray-300 mt-4">
            <div class="mt-4 space-y-2">
                <div class="flex items-baseline w-full h-6">
                    <p class="w-32 text-sm uppercase leading-5 tracking-wider">Sermon Title</p>
                    <p class="flex-1 font-bold text-gray-900">{{ $service->sermon->name }}</p>
                </div>
                <div class="flex items-baseline w-full h-6">
                    <p class="w-32 text-sm uppercase leading-5 tracking-wider">Speaker</p>
                    <p class="flex-1 text-base text-gray-900">{{ $service->sermon->speaker?->full_name ?? 'No speaker' }}</p>
                </div>
                <div class="flex items-baseline w-full h-6">
                    <p class="w-32 text-sm uppercase leading-5 tracking-wider">Scheduled at</p>
                    <p class="flex-1 text-base text-gray-900">{{ $service->service_time }}</p>
                </div>
                <div class="flex items-baseline w-full h-6">
                    <p class="w-32 text-sm uppercase leading-5 tracking-wider">Description</p>
                    <p class="flex-1 text-base text-gray-900">{{ $service->sermon->description }}</p>
                </div>
            </div>
            <div class="mt-4 text-base text-gray-900 space-y-1">
                <stream-controller :sermon='{{ $service->sermon }}'></stream-controller>
                @if($service->sermon->getStatus() !== 'recorded')
                <p class="text-right">Stream key: {{ $service->sermon->stream_key }}</p>
                @else
                <p class="text-right">
                  Link to recording:<br />
                  <a href="https://stream.newlifeglenside.com/recordings/{{ $service->sermon->stream_key }}.mp4" class="text-sm font-medium text-nl-blue-500 hover:text-nl-blue-800">
                    https://stream.newlifeglenside.com/recordings/{{ $service->sermon->stream_key }}.mp4
                  </a>
                </p>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
