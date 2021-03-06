@extends('layouts.app')

@section('title')
{{ $action }} Service
@endsection

@section('content')
<form method="POST" action="{{ isset($service) ? '/admin' . $service->path() : '/admin/services' }}">
  @csrf
  @if (isset($service))
    @method('PUT')
  @else
    @method('POST')
  @endif
  <div>
    @isset($service)
      @if ($service->breeze_id !== '')
      <div class="text-center text-red-600 mt-6 sm:mt-5">
        Changes here will not update in Breeze.
      </div>
      @endif
    @endisset
    <div>
      <div class="mt-6 sm:mt-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Service Name
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ old('name', isset($service) ? $service->name : '') }}" />
            </div>
            @error('name')
            <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <p class="mt-2 text-sm text-gray-500">If left blank, defaults to "Morning Worship Services (Online)".</p>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="description" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Description
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <textarea name="description" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('description', isset($service) ? $service->description : '') }}</textarea>
            </div>
            <p class="mt-2 text-sm text-gray-500">(Optional) This is a good place to put the order of worship.</p>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="service_date" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Service date
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input type="date" name="service_date" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ old('service_date', isset($service) ? $service->service_date : '') }}" />
            </div>
            @error('service_date')
            <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <p class="mt-2 text-sm text-gray-500">The date of the service.</p>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="service_time" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Service time
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input type="time" name="service_time" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ old('service_time', isset($service) ? $service->service_time : '') }}" />
            </div>
            @error('service_time')
            <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <p class="mt-2 text-sm text-gray-500">The time of the service.</p>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="breeze_id" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Breeze ID
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input name="breeze_id" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @isset($service) bg-gray-200 @endisset" value="{{ old('breeze_id', isset($service) ? $service->breeze_id : '') }}" @isset($service) disabled @endisset />
            </div>
            @if (!isset($service))
            <p class="mt-2 text-sm text-gray-500">(Optional) Leave blank to create a new event in Breeze.  Edits to this field will not update Breeze.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">
      <span class="inline-flex rounded-md shadow-sm">
        <a href="{{ isset($service) ? '/admin'.$service->path() : '/admin/services' }}" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
          Cancel
        </a>
      </span>
      <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition duration-150 ease-in-out">
          Save
        </button>
      </span>
    </div>
  </div>
</form>
@endsection
