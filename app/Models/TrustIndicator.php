<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TrustIndicator extends Model
{
    use HasUuids;

    protected $fillable = ['name', 'logo', 'url', 'row_group', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo) {
            return null;
        }
        if (str_starts_with($this->logo, 'http')) {
            return $this->logo;
        }
        return asset('storage/' . $this->logo);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
