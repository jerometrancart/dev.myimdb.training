@extends('backoffice.layouts.master')

@section('title', 'List of movies')

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'List of movies')
<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th>Title</th>
        <th>Year</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $movies as $movie )
        <tr>
            <td>{{ $movie['title'] }}</td>
            <td>{{ $movie['year'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
