@extends('layouts.app')

@section('title', $sermon->name)

@section('actions')

    @can('edit_sermons')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="/admin{{ $sermon->path() }}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
        Edit Sermon
      </a>
    </span>
    @endcan

@endsection

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <video-player :sermon="{{ $sermon }}" scheduled-for="{{ $sermon->service->service_datetime }}"></video-player>
</div>

<div class="sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="text-base leading-5 text-gray-900">{{ $sermon->speaker->full_name }}</div>
    <div class="text-base text-gray-700">
        {{ $sermon->description }}
    </div>
</div>
@endsection
