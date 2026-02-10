<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChangelogVersionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'version' => $this->version,
            'title' => $this->title,
            'release_date' => $this->release_date->format('Y-m-d'),
            'items' => $this->whenLoaded('items', function () {
                return $this->items->groupBy('type')->map(fn ($group) => $group->pluck('description'));
            }),
        ];
    }
}
