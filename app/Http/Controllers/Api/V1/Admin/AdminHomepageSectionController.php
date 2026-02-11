<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminHomepageSectionResource;
use App\Models\HomepageSection;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminHomepageSectionController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = HomepageSection::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['section_key', 'title', 'subtitle']);
        return AdminHomepageSectionResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'section_key' => 'required|unique:homepage_sections,section_key',
            'title' => 'nullable|array',
            'title.en' => 'nullable|string',
            'title.id' => 'nullable|string',
            'subtitle' => 'nullable|array',
            'subtitle.en' => 'nullable|string',
            'subtitle.id' => 'nullable|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.id' => 'nullable|string',
            'content' => 'nullable|array',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $section = HomepageSection::create($validated);
        return response()->json(['data' => new AdminHomepageSectionResource($section)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $section = HomepageSection::find($id);
        if (!$section) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminHomepageSectionResource($section)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $section = HomepageSection::find($id);
        if (!$section) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'section_key' => 'required|unique:homepage_sections,section_key,' . $section->id,
            'title' => 'nullable|array',
            'title.en' => 'nullable|string',
            'title.id' => 'nullable|string',
            'subtitle' => 'nullable|array',
            'subtitle.en' => 'nullable|string',
            'subtitle.id' => 'nullable|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.id' => 'nullable|string',
            'content' => 'nullable|array',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $section->update($validated);
        return response()->json(['data' => new AdminHomepageSectionResource($section)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $section = HomepageSection::find($id);
        if (!$section) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $section->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
