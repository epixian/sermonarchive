@extends('layouts.app')

@section('title', 'Services')

@section('actions')
<div class="flex items-center space-x-2">

    @can('edit_services')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="/admin/services/create" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-600 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Add service
      </a>
    </span>
    @endcan

</div>
@endsection

@section('content')
<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto -mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Service Name
                        </th>
                        <th class="px-4 sm:px-6 py-3 whitespace-no-wrap border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Service Date / Time
                        </th>
                        <th class="px-4 sm:px-6 py-3 whitespace-no-wrap border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Breeze ID
                        </th>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Speaker
                        </th>
                        <th class="px-4 sm:px-6 py-3 whitespace-no-wrap border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Sermon Info
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($services as $service)
                    <tr>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                            <a href="/admin{{ $service->path() }}" class="text-nl-blue-500 hover:text-nl-blue-800">{{ $service->name }}</a>
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            {{ $service->service_datetime->format('Y-m-d') }} at {{ $service->service_datetime->format('h:i a') }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center text-sm leading-5 text-gray-500">
                            {{ $service->breeze_id }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            @if($service->sermon)
                            {{ $service->sermon?->speaker->full_name }}
                            @endif
                        </td>
                        <td class="px-4 sm:px-6 py-4 border-b border-gray-200 text-sm leading-5 font-medium text-gray-500">
                            @if($service->sermon)
                            <a href="/admin{{ $service->sermon->path() }}/edit" class="text-nl-blue-500 hover:text-nl-blue-800">
                                {{ $service->sermon->name }}
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
