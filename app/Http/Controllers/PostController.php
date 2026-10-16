<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // route: /posts/
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
            ->get();

        return view('projects.index', [
            'posts' => $posts,
            'pinnedPost' => $pinnedPost,
            'highlightedPost' => $highlightedPost
        ]);
    }
}
