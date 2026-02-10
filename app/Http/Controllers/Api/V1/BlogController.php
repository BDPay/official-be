<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = $request->integer('per_page', 9);

        $posts = BlogPost::published()
            ->orderByDesc('published_at')
            ->paginate($perPage);

        return BlogPostResource::collection($posts);
    }

    public function show(string $slug): BlogPostResource|JsonResponse
    {
        $post = BlogPost::published()->where('slug', $slug)->first();

        if (!$post) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return new BlogPostResource($post);
    }
}
