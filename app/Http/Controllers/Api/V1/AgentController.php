<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AgentController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Agent::active()->orderBy('sort_order');

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($city = $request->query('city')) {
            $query->where('city', $city);
        }

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        return AgentResource::collection($query->get());
    }
}
