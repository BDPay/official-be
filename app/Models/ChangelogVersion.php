<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class ChangelogVersion extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['version', 'title', 'release_date', 'sort_order'];

    public array $translatable = ['title'];

    protected function casts(): array
    {
        return [
            'release_date' => 'date',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(ChangelogItem::class)->orderBy('sort_order');
    }
}
