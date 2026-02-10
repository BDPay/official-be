<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|image|max:2048',
            'directory' => 'nullable|string',
        ]);

        $directory = $request->input('directory', 'uploads');
        $path = $request->file('file')->store($directory, 'public');

        return response()->json([
            'path' => $path,
            'url' => asset('storage/' . $path),
        ], 201);
    }
}
