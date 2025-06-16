<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class SkillCategory extends Model
{
    use SoftDeletes, HasTranslations;

    public array $translatable = ['name'];

    protected $fillable = [
        'name',
        'order',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
