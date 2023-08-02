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
        <th>Id</th>
        <th>Title</th>
        <th>Year</th>
        <th>Running time</th>
        <th>Rating</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $movies as $movie )
        <tr>
            <td>{{ $movie['id'] }}</td>
            <td>{{ $movie['title'] }}</td>
            <td>{{ $movie['year'] }}</td>
            <td>{{ $movie['running_time'] }}</td>
            <td>{{ $movie['rating'] }}</td>
            <td>{{ $movie['created_at']->format('d/m/Y') }}</td>
            <td>{{ $movie['updated_at']->format('d/m/Y') }}</td>
            <td>
                <ul class="list-inline list-unstyled">
                    <li class="list-inline-item"><a href="{{ route('backoffice.movies.show', ['id' =>$movie['id']]) }}">Show</a></li>
                    <li class="list-inline-item"><a href="{{ route('backoffice.movies.edit', ['id' =>$movie['id']]) }}">Edit</a></li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<ul class="list-inline list-unstyled">
    <a href="{{ route('backoffice.movies.create', ['id' =>$movie['id']]) }}">Add</a>
</ul>

@endsection
