<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminHomepageSectionResource;
use App\Models\HomepageSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminHomepageSectionController extends Controller
{
    public function index(): JsonResponse
    {
        $sections = HomepageSection::orderBy('sort_order')->get();
        return response()->json(['data' => AdminHomepageSectionResource::collection($sections)]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'section_key' => 'required|unique:homepage_sections,section_key',
            'title' => 'nullable',
            'subtitle' => 'nullable',
            'description' => 'nullable',
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
            'title' => 'nullable',
            'subtitle' => 'nullable',
            'description' => 'nullable',
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
