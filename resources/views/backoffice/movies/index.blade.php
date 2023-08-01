@extends('backoffice.layouts.master')

@section('title', 'List of movies')

@section('sidebar')
    @parent
    This is index sidebar appended to the master sidebar
    <hr>
@endsection

@section('content')
    List of movies :
    {{-- Loop through movies --}}
    <ul>
        @foreach( $movies as $movie)
            <li>{{ $movie['title'] .', '.$movie['year'] }}</li>
        @endforeach
    </ul>
@endsection
