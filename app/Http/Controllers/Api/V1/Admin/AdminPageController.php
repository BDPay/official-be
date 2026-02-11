<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminPageResource;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index(): JsonResponse
    {
        $pages = Page::orderBy('slug')->get();
        return response()->json(['data' => AdminPageResource::collection($pages)]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug',
            'title' => 'required',
            'content' => 'required',
            'meta_description' => 'nullable',
            'is_published' => 'nullable|boolean',
        ]);

        $page = Page::create($validated);
        return response()->json(['data' => new AdminPageResource($page)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $page = Page::find($id);
        if (!$page) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminPageResource($page)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $page = Page::find($id);
        if (!$page) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'title' => 'required',
            'content' => 'required',
            'meta_description' => 'nullable',
            'is_published' => 'nullable|boolean',
        ]);

        $page->update($validated);
        return response()->json(['data' => new AdminPageResource($page)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $page = Page::find($id);
        if (!$page) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $page->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
