<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminFeatureItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'feature_category_id' => $this->feature_category_id,
            'title' => $this->getTranslation('title', 'en', false) ?? '',
            'description' => $this->getTranslation('description', 'en', false) ?? '',
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
