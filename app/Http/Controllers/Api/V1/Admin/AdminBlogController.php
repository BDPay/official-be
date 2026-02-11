<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminBlogPostResource;
use App\Models\BlogPost;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminBlogController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = BlogPost::orderByDesc('created_at');
        $paginated = $this->paginateAndSearch($query, $request, ['title', 'slug', 'excerpt']);
        return AdminBlogPostResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'nullable|string|unique:blog_posts,slug',
            'excerpt' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $post = BlogPost::create($validated);
        return response()->json(['data' => new AdminBlogPostResource($post)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $post = BlogPost::find($id);
        if (!$post) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminBlogPostResource($post)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $post = BlogPost::find($id);
        if (!$post) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'nullable|string|unique:blog_posts,slug,' . $post->id,
            'excerpt' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $post->update($validated);
        return response()->json(['data' => new AdminBlogPostResource($post)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $post = BlogPost::find($id);
        if (!$post) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $post->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
