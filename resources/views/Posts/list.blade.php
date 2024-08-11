@extends('layouts.app')

@section('title', "List All Posts")

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <br>
    <a href="/posts/create" class="btn btn-primary btn-sm">Create New Post</a> <br><br>
    <h1>List All Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="table-primary">ID</th>
            <th scope="col" class="table-primary">Title</th>
            <th scope="col" class="table-primary">Body</th>
            <th scope="col" class="table-primary">Posted By</th>
            <th scope="col" class="table-primary">Created At</th>
            <th scope="col" class="table-primary">Updated At</th>
            <th scope="col" class="table-primary">Actions</th>
        </tr>
        </thead>
        <tbody>
        {{-- we can access data as object or as array --}}
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a href="/posts/{{ $post['id'] }}" class="btn btn-primary btn-sm">View</a>
                    <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/posts/{{ $post['id'] }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
