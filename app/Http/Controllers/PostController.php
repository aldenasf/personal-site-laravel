<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:255',
            'pinned' => 'required|boolean',
        ]);

        $post = Post::create($validated);

        return response()->json([
            'message' => 'Post created successfully',
            'data' => $post,
        ], 201);
    }
}
