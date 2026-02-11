<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminFeatureItemResource;
use App\Models\FeatureItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminFeatureItemController extends Controller
{
    public function index(): JsonResponse
    {
        $items = FeatureItem::orderBy('sort_order')->get();
        return response()->json(['data' => AdminFeatureItemResource::collection($items)]);
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
