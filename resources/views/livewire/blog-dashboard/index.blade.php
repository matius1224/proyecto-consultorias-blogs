@extends('layouts.single')
@section('title', __('Dashboard'))
@section('content')
    @include('layouts.app')
    @livewire('blog-dashboard')
@endsection