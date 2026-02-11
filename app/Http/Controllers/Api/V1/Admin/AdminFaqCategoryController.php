<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminFaqCategoryResource;
use App\Models\FaqCategory;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminFaqCategoryController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = FaqCategory::with('items')->orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['name', 'slug', 'description']);
        return AdminFaqCategoryResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'slug' => 'required|unique:faq_categories,slug',
            'sort_order' => 'nullable|integer',
        ]);

        $category = FaqCategory::create($validated);
        return response()->json(['data' => new AdminFaqCategoryResource($category)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $category = FaqCategory::with('items')->find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminFaqCategoryResource($category)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $category = FaqCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'slug' => 'required|unique:faq_categories,slug,' . $category->id,
            'sort_order' => 'nullable|integer',
        ]);

        $category->update($validated);
        return response()->json(['data' => new AdminFaqCategoryResource($category)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $category = FaqCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
