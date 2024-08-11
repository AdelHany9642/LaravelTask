<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    // list all posts
    function index(): View
    {
        $posts = Post::with('user')->paginate(3);// Fetch all posts from the database
        return view('posts.list', ['posts' => $posts]);
    }

    // show the form to create a new post
    function create(): View
    {
        return view('posts.create');
    }

    // store a new post in the database
    public function store(StorePostRequest $request): RedirectResponse
    {
        /*  we made a request instead to encapsulate the validation
            $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|string',
            'created_by' => 'required|string|max:255',
        ]);*/

        /* first method to create
        Post::create($request->all()); */

//        Post::create($validatedData);

        // second method to create
        $post = new Post();

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->created_by = $request->input('created_by');
        $post->user_id = Auth::id();

        $post->save(); // save the post to the database

        return redirect('/posts')->with('success', 'Post created successfully');
    }

    // Display a single post
    function show($id): View
    {
        $post = Post::findOrfail($id); // Fetch the post by ID or fail with a 404 error
        return view('posts.show', ['post' => $post]);
    }

    // show the form to edit a post
    function edit($id): View
    {
        $post = Post::findOrfail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(StorePostRequest $request, $id): RedirectResponse
    {
        /*  we made a request instead to encapsulate the validation
        $validatedData = $request->validate([
            'title' => 'required|unique:posts,title,' . $id . '|max:255',
            'body' => 'required|string',
            'created_by' => 'required|string|max:255',
        ]);*/

        $post = Post::findOrfail($id);

        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->created_by = $request['created_by'];

        $post->save();

        return redirect('/posts')->with('success', 'Item updated successfully');
    }

    function destroy($id): RedirectResponse
    {
        Post::destroy($id);
        return redirect('/posts');
    }
}
