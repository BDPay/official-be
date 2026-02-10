<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrustIndicator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminTrustIndicatorController extends Controller
{
    public function index(): JsonResponse
    {
        $indicators = TrustIndicator::orderBy('sort_order')->get();
        return response()->json(['data' => $indicators]);
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
        return response()->json(['data' => $indicator], 201);
    }

    public function show(string $id): JsonResponse
    {
        $indicator = TrustIndicator::find($id);
        if (!$indicator) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => $indicator]);
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
        return response()->json(['data' => $indicator]);
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
