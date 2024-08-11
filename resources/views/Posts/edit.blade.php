@extends('layouts.app')

@section('title', "Edit Post")


@section('content')
    <br>
    <a href="/posts" class="btn btn-primary btn-sm" >Back to Posts</a>
    <br><br>
    <h1>Edit Post</h1>
    <form action="/posts/{{ $post['id'] }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title" value="{{ $post['title'] }}" required>
        </div>

        <div class="mb-3">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" required>{{ $post['body'] }}</textarea>
        </div>

        <div class="mb-3">
            <label for="created_by">Created By</label>
            <input type="text" id="created_by" class="form-control" name="created_by" value="{{ $post['created_by'] }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
