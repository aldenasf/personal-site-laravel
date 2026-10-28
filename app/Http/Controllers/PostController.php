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

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request): JsonResponse
    {
        $request->merge([
            'pinned' => $request->boolean('pinned'),
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:255',
            'pinned' => 'boolean',
        ]);

        $post = Post::create($validated);

        // $response = $request->wantsJson() ? response()->json([
        //     'message' => 'Post created successfully',
        //     'data' => $post,
        // ], 201) : redirect()->route('projects.shows', [
        //                 'id' => $post
        //             ]);

        $response = response()->json([
            'message' => 'Post created successfully',
            'data' => $post,
        ], 201);

        return $response;
    }

    public function delete(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $post = Post::destroy($validated);

        if ($post) {
            $response = response()->json([
                'message' => 'Post deleted successfully.',
                'data' => $post,
            ]);
        } else {
            $response = response()->json([
                'message' => 'Post not found.',
            ]);
        }

        return $response;
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:posts,id',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image' => 'sometimes|string|max:255',
            'pinned' => 'sometimes|boolean',
        ]);

        $post = Post::findOrFail($validated['id']);

        $post->update($validated);

        $response = response()->json([
            'message' => 'Post updated successfully.',
            'data' => $post,
        ]);

        return $response;
    }
}
