@extends('backoffice.layouts.master')

@section('title', 'Add a movie')

@section('sidebar')
    @parent
@endsection

@section('content')

@section('main_title', 'Add a movie')

<form>
    <div class="mb-3">
        <label for="title" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="title" value="">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="year" value="">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="synopsis" value="">
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label fw-bold fs-6"></label>
        <input type="text" class="form-control" id="rating" value="">
    </div>
    <button type="submit" value="update" class="btn btn-primary">Create</button>
</form>


@endsection
