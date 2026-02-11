<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminSettingResource;
use App\Models\Setting;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminSettingController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Setting::orderBy('group')->orderBy('key');
        $paginated = $this->paginateAndSearch($query, $request, ['group', 'key']);
        return AdminSettingResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'group' => 'required|string',
            'key' => 'required|string',
            'value' => 'nullable',
        ]);

        $setting = Setting::create($validated);
        return response()->json(['data' => new AdminSettingResource($setting)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminSettingResource($setting)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'group' => 'required|string',
            'key' => 'required|string',
            'value' => 'nullable',
        ]);

        $setting->update($validated);
        return response()->json(['data' => new AdminSettingResource($setting)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $setting->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
