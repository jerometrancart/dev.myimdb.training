@extends('backoffice.layouts.master')

@section('title', 'Show a movie | '.$movie['title']. ' | '. $movie['year'])

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Show a movie : '.$movie['title'].' ('.$movie['year'].') ')

<table class="table table-bordered table-sm">
    <tbody>
    <tr>
        <th class="w-25">Id</th>
        <td>{{ $movie['id'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Title</th>
        <td>{{ $movie['title'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Year</th>
        <td>{{ $movie['year'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Synopsis</th>
        <td>{{ $movie['synopsis'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Running time</th>
        <td>{{ $movie['running_time'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Rating</th>
        <td>{{ $movie['rating'] }}</td>
    </tr>
    <tr>
        <th class="w-25">Created at</th>
        <td>{{ $movie['created_at']->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <th class="w-25">Updated at</th>
        <td>{{ $movie['updated_at']->format('d/m/Y') }}</td>
    </tr>

    </tbody>

</table>

@endsection


