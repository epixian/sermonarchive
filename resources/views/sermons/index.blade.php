@extends('layouts.app')

@section('title', 'Sermons')

@section('content')
<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto -mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Sermon Name
                        </th>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Publish Date
                        </th>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Other
                        </th>
                        <th class="px-4 sm:px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($sermons as $sermon)
                    <tr>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                            {{ $sermon->name }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            {{ $sermon->publish_date }}
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            asdf
                        </td>
                        <td class="px-4 sm:px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            @auth
                            <a href="/admin/sermons/{{ $sermon->id }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            @else
                            <a href="/sermons/{{ $sermon->id }}" class="text-indigo-600 hover:text-indigo-900">Listen</a>
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
