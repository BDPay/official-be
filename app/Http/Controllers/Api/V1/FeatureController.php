<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureCategoryResource;
use App\Models\FeatureCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FeatureController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = FeatureCategory::with(['items' => fn ($q) => $q->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get();

        return FeatureCategoryResource::collection($categories);
    }

    public function show(string $slug): FeatureCategoryResource|JsonResponse
    {
        $category = FeatureCategory::with(['items' => fn ($q) => $q->orderBy('sort_order')])
            ->where('slug', $slug)
            ->first();

        if (!$category) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return new FeatureCategoryResource($category);
    }
}
