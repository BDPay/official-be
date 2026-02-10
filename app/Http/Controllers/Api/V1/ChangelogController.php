<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChangelogVersionResource;
use App\Models\ChangelogVersion;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChangelogController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $versions = ChangelogVersion::with(['items' => fn ($q) => $q->orderBy('sort_order')])
            ->orderByDesc('release_date')
            ->get();

        return ChangelogVersionResource::collection($versions);
    }
}
