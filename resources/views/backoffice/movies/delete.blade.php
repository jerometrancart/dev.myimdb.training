@extends('backoffice.layouts.master')

@section('title', 'Delete a movie | '.$movie['title']. ' | '. $movie['year'])

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Delete a movie : '.$movie['title'].' ('.$movie['year'].') ')

<div class="alert alert-warning" role="warning">
    <h4 class="alert-heading">Are you sure you want to delete this movie ?</h4>
</div>

<form>
    <button type="submit" value="delete" class="btn btn-primary">Delete</button>
</form>

@endsection


