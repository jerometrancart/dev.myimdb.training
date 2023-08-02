<form>
    <div class="mb-3">
        <label for="title" class="form-label fw-bold fs-6">Title</label>
        <input type="text" class="form-control" id="title" value="{{ (isset($movie))? $movie['title'] : ''}}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label fw-bold fs-6">Year</label>
        <input type="text" class="form-control" id="year" value="{{ (isset($movie))? $movie['year'] : ''}}">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label fw-bold fs-6">Synopsis</label>
        <textarea class="form-control" id="synopsis" rows="3">{{ (isset($movie))? $movie['synopsis'] : '' }}</textarea>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label fw-bold fs-6">Rating</label>
        <input type="text" class="form-control" id="rating" value="{{ (isset($movie))? $movie['rating'] : '' }}">
    </div>
    @if (isset($movie))
        <button type="submit" value="update" class="btn btn-primary">Update</button>
    @else
        <button type="submit" value="create" class="btn btn-primary">Create</button>
    @endif
</form>
