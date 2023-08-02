@extends('backoffice.layouts.master')

@section('title', 'Edit a movie | '.$movie['title']. ' | '. $movie['year'])

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Edit a movie : '.$movie['title'].' ('.$movie['year'].') ')

@include('backoffice.movies.partials._form', ['movie' => $movie ])

@endsection
