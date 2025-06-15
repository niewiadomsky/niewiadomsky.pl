<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

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

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
