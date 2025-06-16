<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasTranslations;

    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'live_url',
        'iframe_url',
        'github_url',
        'order',
        'created_year',
        'is_commercial',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
