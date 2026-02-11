<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminTrustIndicatorResource;
use App\Models\TrustIndicator;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminTrustIndicatorController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = TrustIndicator::orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['name', 'url']);
        return AdminTrustIndicatorResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'logo' => 'required|string',
            'url' => 'nullable|string',
            'row_group' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $indicator = TrustIndicator::create($validated);
        return response()->json(['data' => new AdminTrustIndicatorResource($indicator)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $indicator = TrustIndicator::find($id);
        if (!$indicator) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminTrustIndicatorResource($indicator)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $indicator = TrustIndicator::find($id);
        if (!$indicator) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'logo' => 'required|string',
            'url' => 'nullable|string',
            'row_group' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $indicator->update($validated);
        return response()->json(['data' => new AdminTrustIndicatorResource($indicator)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $indicator = TrustIndicator::find($id);
        if (!$indicator) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $indicator->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
