<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    public function show(string $group): JsonResponse
    {
        $settings = Setting::getByGroup($group);

        return response()->json(['data' => $settings]);
    }
}
