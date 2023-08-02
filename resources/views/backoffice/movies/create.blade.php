@extends('backoffice.layouts.master')

@section('title', 'Add a movie')

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Add a movie')

@include('backoffice.movies.partials._form')


@endsection
