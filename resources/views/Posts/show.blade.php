@extends('layouts.app')

@section('title', "Show Post")


@section('content')
    <br>
    <h1>View One Post</h1><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="table-primary">ID</th>
            <th scope="col" class="table-primary">Title</th>
            <th scope="col" class="table-primary">Body</th>
            <th scope="col" class="table-primary">Created By</th>
            <th scope="col" class="table-primary">Created At</th>
            <th scope="col" class="table-primary">Updated At</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{ $post['id'] }}</th>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['body'] }}</td>
            <td>{{ $post['created_by'] }}</td>
            <td>{{ $post['created_at'] }}</td>
            <td>{{ $post['updated_at'] }}</td>
        </tr>
        </tbody>
    </table>
    <a href="/posts" class="btn btn-primary">Back to Posts</a>
@endsection
