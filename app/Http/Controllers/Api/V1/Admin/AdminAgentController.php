<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminAgentResource;
use App\Models\Agent;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminAgentController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Agent::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['name', 'city', 'email', 'phone']);
        return AdminAgentResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|in:in_house,external',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|array',
            'address.en' => 'nullable|string',
            'address.id' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'maps_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $agent = Agent::create($validated);
        return response()->json(['data' => new AdminAgentResource($agent)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $agent = Agent::find($id);
        if (!$agent) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminAgentResource($agent)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $agent = Agent::find($id);
        if (!$agent) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'nullable|in:in_house,external',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|array',
            'address.en' => 'nullable|string',
            'address.id' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'maps_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $agent->update($validated);
        return response()->json(['data' => new AdminAgentResource($agent)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $agent = Agent::find($id);
        if (!$agent) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $agent->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
