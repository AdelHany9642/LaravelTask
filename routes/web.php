<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//// list all posts
//Route::get('/posts',[PostController::class, 'index']);
//
//// create post
//Route::get('/posts/create', [PostController::class, 'create']);
//
//// store
//Route::post('/posts', [PostController::class, 'store']);
//
//// View One Post
//Route::get('/posts/{id}', [PostController::class, 'show']);
//
//// Edit Page
//Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
//
//// update
//Route::put('/posts/{id}', [PostController::class, 'update']);
//
//// Delete Post
//Route::delete('/posts/{id}',[PostController::class, 'destroy']);

Route::resource('/posts', PostController::class)->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
