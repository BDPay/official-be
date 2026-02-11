<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminFeatureItemResource;
use App\Models\FeatureItem;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminFeatureItemController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = FeatureItem::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['title', 'description']);
        return AdminFeatureItemResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'feature_category_id' => 'required|exists:feature_categories,id',
            'title' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item = FeatureItem::create($validated);
        return response()->json(['data' => new AdminFeatureItemResource($item)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $item = FeatureItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminFeatureItemResource($item)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $item = FeatureItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'feature_category_id' => 'required|exists:feature_categories,id',
            'title' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);
        return response()->json(['data' => new AdminFeatureItemResource($item)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $item = FeatureItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
