@extends('layouts.app')

@section('title', "Create New Post")

@section('content')
    <br>
    <a href="/posts" class="btn btn-primary">Back to Posts</a>
    <br><br>
    <h1>Create New Post</h1>

    <form action="/posts" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title">
        </div>

        <div class="mb-3">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body"></textarea>
        </div>

        <div class="mb-3">
            <label for="created_by">Created By</label>
            <input type="text" id="created_by" class="form-control" name="created_by">
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
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
