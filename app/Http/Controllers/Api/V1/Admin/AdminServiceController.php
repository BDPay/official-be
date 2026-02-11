<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index(): JsonResponse
    {
        $services = Service::orderBy('sort_order')->get();
        return response()->json(['data' => AdminServiceResource::collection($services)]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
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
            'title' => 'required',
            'description' => 'nullable',
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
