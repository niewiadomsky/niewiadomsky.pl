<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Skill extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasTranslations;

    public array $translatable = ['description'];

    protected $fillable = [
        'name',
        'description',
        'level',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
}
