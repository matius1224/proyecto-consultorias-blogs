@extends('layouts.single')
@section('title', __('Dashboard'))
@section('content')
    @include('layouts.app')
    @livewire('compartir-enlace-blog',['id_blog'=>$id_blog])
@endsection
