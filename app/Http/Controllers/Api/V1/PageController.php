<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    public function show(string $slug): PageResource|JsonResponse
    {
        $page = Page::published()->where('slug', $slug)->first();

        if (!$page) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return new PageResource($page);
    }
}
