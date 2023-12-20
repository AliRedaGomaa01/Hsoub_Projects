<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validatePost();
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author'),
        ]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->where('approved', '=', 0)->get();
        return view('posts.show', compact(['post', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        $this->validatePost();
        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author')
        ]);
        return redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function validatePost()
    {
        request()->validate([
            'title' => 'required|unique:posts|max:200',
            'body' => 'required',
            'author' => ['required', 'max:100'],
        ]);
    }
}
