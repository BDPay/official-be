<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class FaqItem extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['faq_category_id', 'question', 'answer', 'sort_order'];

    public array $translatable = ['question', 'answer'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
