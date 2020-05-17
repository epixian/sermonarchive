@extends('layouts.app')

@section('title')
{{ $action }} Sermon
@endsection

@section('content')
<form method="POST" action="{{ $service->path() }}/sermons">
  @csrf
  <div>
    <div>
      <div class="mt-6 sm:mt-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Sermon Title
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ old('name', isset($sermon) ? $sermon->name : '') }}"/>
            </div>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="description" name="description" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Description
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <textarea name="description" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('description', isset($sermon) ? $sermon->description : '') }}</textarea>
            </div>
            <p class="mt-2 text-sm text-gray-500">(Optional) Write a few sentences on what the sermon is about.</p>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="speaker" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Speaker
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
              <select aria-label="Speaker" id="speaker" name="speaker_id" class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @foreach($speakers as $speaker)
                <option value="{{ $speaker->id }}">{{ $speaker->full_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Scheduled Time
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <input name="scheduled_time" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{ old('scheduled_time', isset($sermon) ? $sermon->scheduled_time : '') }}"/>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">
      <span class="inline-flex rounded-md shadow-sm">
        <a href="{{ isset($sermon) ? $sermon->path() : $service->path() }}" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
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
