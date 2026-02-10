<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChangelogItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminChangelogItemController extends Controller
{
    public function index(): JsonResponse
    {
        $items = ChangelogItem::orderBy('sort_order')->get();
        return response()->json(['data' => $items]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'changelog_version_id' => 'required|exists:changelog_versions,id',
            'type' => 'required|in:added,changed,fixed,removed',
            'description' => 'required',
            'sort_order' => 'nullable|integer',
        ]);

        $item = ChangelogItem::create($validated);
        return response()->json(['data' => $item], 201);
    }

    public function show(string $id): JsonResponse
    {
        $item = ChangelogItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => $item]);
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
            'description' => 'required',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);
        return response()->json(['data' => $item]);
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
