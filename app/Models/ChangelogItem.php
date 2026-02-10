<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ChangelogItem extends Model
{
    use HasUuids, HasTranslations;

    protected $fillable = ['changelog_version_id', 'type', 'description', 'sort_order'];

    public array $translatable = ['description'];

    public function version(): BelongsTo
    {
        return $this->belongsTo(ChangelogVersion::class, 'changelog_version_id');
    }
}
