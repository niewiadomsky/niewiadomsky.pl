<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ExperienceEntry extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public array $translatable = ['description'];

    protected $fillable = [
        'experience_id',
        'description',
        'order',
    ];

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}
