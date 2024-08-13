@extends('layouts.single-admin')
@section('title', __('Panel administrativo'))
@section('content')
    @include('layouts.app-admin')
    @livewire('consultorias')
@endsection
