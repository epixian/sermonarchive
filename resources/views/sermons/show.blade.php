@extends('layouts.app')

@section('title', $sermon->name)

@section('content')
    <livewire:sermons.show :sermon="$sermon">
@endsection
