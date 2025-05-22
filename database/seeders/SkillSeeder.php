<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laravel = Skill::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax.',
            'level' => 5,
        ]);

        $php = Skill::create(attributes: [
            'name' => 'PHP',
            'description' => 'PHP is a server-side scripting language designed for web development.',
            'level' => 5,
        ]);

        $laravel->addMedia(storage_path('seeders/skills/laravel.svg'))->toMediaCollection('skills');
        $php->addMedia(storage_path('seeders/skills/php.svg'))->toMediaCollection('skills');
    }
}
