<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceHighlight extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['title', 'content', 'sort_order', 'is_active'];

    public array $translatable = ['title', 'content'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
