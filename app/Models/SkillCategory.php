<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'order',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
