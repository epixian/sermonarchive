@extends('layouts.app')

@section('title', 'Sermons')

@section('content')
    <livewire:sermons.index :sermons="$sermons">
@endsection
