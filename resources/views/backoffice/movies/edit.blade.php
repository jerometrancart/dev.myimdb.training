@extends('backoffice.layouts.master')

@section('title', 'Edit a movie | '.$movie['title']. ' | '. $movie['year'])

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Edit a movie : '.$movie['title'].' ('.$movie['year'].') ')

<form action="">
    <div class="mb-3">
        <label for="title" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="title" value="{{ $movie['title'] }}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="year" value="{{ $movie['year'] }}">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="synopsis" value="{{ $movie['synopsis'] }}">
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="rating" value="{{ $movie['rating'] }}">
    </div>
    <button type="submit" value="update" class="btn btn-primary">Update</button>
</form>

@endsection
