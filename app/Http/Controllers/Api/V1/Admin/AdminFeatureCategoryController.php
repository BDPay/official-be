<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminFeatureCategoryResource;
use App\Models\FeatureCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminFeatureCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = FeatureCategory::with('items')->orderBy('sort_order')->get();
        return response()->json(['data' => AdminFeatureCategoryResource::collection($categories)]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:feature_categories,slug',
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $category = FeatureCategory::create($validated);
        return response()->json(['data' => new AdminFeatureCategoryResource($category)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $category = FeatureCategory::with('items')->find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminFeatureCategoryResource($category)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $category = FeatureCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:feature_categories,slug,' . $category->id,
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $category->update($validated);
        return response()->json(['data' => new AdminFeatureCategoryResource($category)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $category = FeatureCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
