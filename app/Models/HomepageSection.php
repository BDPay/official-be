<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomepageSection extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = [
        'section_key', 'title', 'subtitle', 'description',
        'content', 'sort_order', 'is_active',
    ];

    public array $translatable = ['title', 'subtitle', 'description'];

    protected function casts(): array
    {
        return [
            'content' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
