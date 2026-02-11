<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminServiceResource;
use App\Models\Service;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminServiceController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Service::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['title', 'description']);
        return AdminServiceResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.id' => 'nullable|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.id' => 'nullable|string',
            'items' => 'nullable|array',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $service = Service::create($validated);
        return response()->json(['data' => new AdminServiceResource($service)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminServiceResource($service)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string',
            'title.id' => 'nullable|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.id' => 'nullable|string',
            'items' => 'nullable|array',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $service->update($validated);
        return response()->json(['data' => new AdminServiceResource($service)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $service->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
