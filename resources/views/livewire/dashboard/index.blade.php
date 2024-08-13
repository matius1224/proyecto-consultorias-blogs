@extends('layouts.single')
@section('title', __('Dashboard'))
@section('content')
    @include('layouts.app')
    @livewire('dashboard')
@endsection
