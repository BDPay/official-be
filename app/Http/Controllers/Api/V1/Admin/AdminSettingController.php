<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index(): JsonResponse
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get();
        return response()->json(['data' => $settings]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'group' => 'required|string',
            'key' => 'required|string',
            'value' => 'nullable',
        ]);

        $setting = Setting::create($validated);
        return response()->json(['data' => $setting], 201);
    }

    public function show(string $id): JsonResponse
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => $setting]);
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
        return response()->json(['data' => $setting]);
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
