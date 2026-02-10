<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class FaqCategory extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['name', 'description', 'slug', 'sort_order'];

    public array $translatable = ['name', 'description'];

    public function items(): HasMany
    {
        return $this->hasMany(FaqItem::class)->orderBy('sort_order');
    }
}
