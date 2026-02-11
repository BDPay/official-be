<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminServiceHighlightResource;
use App\Models\ServiceHighlight;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminServiceHighlightController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = ServiceHighlight::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['title', 'content']);
        return AdminServiceHighlightResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $highlight = ServiceHighlight::create($validated);
        return response()->json(['data' => new AdminServiceHighlightResource($highlight)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $highlight = ServiceHighlight::find($id);
        if (!$highlight) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminServiceHighlightResource($highlight)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $highlight = ServiceHighlight::find($id);
        if (!$highlight) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $highlight->update($validated);
        return response()->json(['data' => new AdminServiceHighlightResource($highlight)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $highlight = ServiceHighlight::find($id);
        if (!$highlight) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $highlight->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
