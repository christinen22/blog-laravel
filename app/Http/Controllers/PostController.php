<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Method to display a list of blog posts
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json(['posts' => $posts]);
    }


    // Method to show an individual blog post
    public function show(Post $post)
    {
        return [
            "status" => 1,
            "data" => $post
        ];
    }

    // Method to display the create post form
    public function create()
    {
        return view('posts.create');
    }

    // Method to store a new blog post
    public function store(Request $request)
    {
        try {
            $this->authorize('create', Post::class);
            $this->validate($request, [
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'required | url'
            ]);

            $post = new Post;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->image = $request->input('image');
            $post->save();

            return response()->json(['message' => 'Post created successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
