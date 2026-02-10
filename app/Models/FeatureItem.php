<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class FeatureItem extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['feature_category_id', 'title', 'description', 'icon', 'sort_order'];

    public array $translatable = ['title', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FeatureCategory::class, 'feature_category_id');
    }
}
