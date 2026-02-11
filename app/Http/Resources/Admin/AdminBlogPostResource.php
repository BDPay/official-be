<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminBlogPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getTranslations('title'),
            'slug' => $this->slug,
            'excerpt' => $this->getTranslations('excerpt'),
            'content' => $this->getTranslations('content'),
            'image' => $this->image,
            'image_url' => $this->image_url,
            'published_at' => $this->published_at?->toIso8601String(),
            'is_published' => $this->is_published,
            'author_id' => $this->author_id,
            'sort_order' => $this->sort_order,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
