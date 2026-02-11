<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminChangelogVersionResource;
use App\Models\ChangelogVersion;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminChangelogVersionController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = ChangelogVersion::with('items')->orderByDesc('release_date');
        $paginated = $this->paginateAndSearch($query, $request, ['version', 'title']);
        return AdminChangelogVersionResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'version' => 'required',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.id' => 'nullable|string',
            'release_date' => 'required|date',
            'sort_order' => 'nullable|integer',
        ]);

        $version = ChangelogVersion::create($validated);
        return response()->json(['data' => new AdminChangelogVersionResource($version)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $version = ChangelogVersion::with('items')->find($id);
        if (!$version) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminChangelogVersionResource($version)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $version = ChangelogVersion::find($id);
        if (!$version) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'version' => 'required',
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.id' => 'nullable|string',
            'release_date' => 'required|date',
            'sort_order' => 'nullable|integer',
        ]);

        $version->update($validated);
        return response()->json(['data' => new AdminChangelogVersionResource($version)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $version = ChangelogVersion::find($id);
        if (!$version) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $version->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
