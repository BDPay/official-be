<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Agent extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = [
        'name', 'type', 'phone', 'email', 'address',
        'city', 'province', 'latitude', 'longitude',
        'maps_url', 'is_active', 'sort_order',
    ];

    public array $translatable = ['address'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
