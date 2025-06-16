<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public array $translatable = ['position'];

    protected $fillable = [
        'position',
        'company',
        'location',
        'started_at',
        'ended_at',
    ];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    public function entries(): HasMany
    {
        return $this->hasMany(ExperienceEntry::class);
    }
}
