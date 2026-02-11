<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminChangelogItemResource;
use App\Models\ChangelogItem;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminChangelogItemController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = ChangelogItem::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['description', 'type']);
        return AdminChangelogItemResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'changelog_version_id' => 'required|exists:changelog_versions,id',
            'type' => 'required|in:added,changed,fixed,removed',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.id' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item = ChangelogItem::create($validated);
        return response()->json(['data' => new AdminChangelogItemResource($item)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $item = ChangelogItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminChangelogItemResource($item)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $item = ChangelogItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'changelog_version_id' => 'required|exists:changelog_versions,id',
            'type' => 'required|in:added,changed,fixed,removed',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.id' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);
        return response()->json(['data' => new AdminChangelogItemResource($item)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $item = ChangelogItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
