@extends('layouts.app')

@section('title', 'Services')

@section('actions')
<div class="flex items-center space-x-2">

    @can('edit_services')
    <span class="inline-flex rounded-md shadow-sm">
      <a href="/admin/services/create" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
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
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Service Date
                        </th>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Other
                        </th>
                        @can('edit_service')
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($services as $service)
                    <tr>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                            <a href="{{ $service->path() }}" class="text-indigo-600 hover:text-indigo-900">{{ $service->name }}</a>
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            {{ $service->service_date }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            asdf
                        </td>
                        @can('edit_service')
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            <a href="{{ $service->path() }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection