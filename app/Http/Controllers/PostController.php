<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        auth()->user()->posts()->create($validatedData);
        Post::create($request->validated() + ['user_id' => auth()->id()]);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
}
