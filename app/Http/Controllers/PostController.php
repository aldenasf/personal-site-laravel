<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $pinnedPost = Post::where('pinned', true)->first();

        $highlightedPost = $pinnedPost;

        if ($highlightedPost === null) {
            $highlightedPost = Post::orderBy('updated_at', 'desc')->first();
        }

        $posts = Post::when($highlightedPost, function ($query) use ($highlightedPost) {
            return $query->where('id', '!=', $highlightedPost->id);
        })
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        return view('projects.index', [
            'posts' => $posts,
            'pinnedPost' => $pinnedPost,
            'highlightedPost' => $highlightedPost,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('projects.show', [
            'post' => $post,
        ]);
    }
}
