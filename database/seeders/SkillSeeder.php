<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languagesCategory = SkillCategory::create([
            'name' => 'Języki programowania',
            'order' => 1,
        ]);

        $frameworksCategory = SkillCategory::create([
            'name' => 'Frameworki / Biblioteki',
            'order' => 2,
        ]);

        $databasesCategory = SkillCategory::create([
            'name' => 'Bazy danych',
            'order' => 3,
        ]);

        $toolsCategory = SkillCategory::create([
            'name' => 'Narzędzia',
            'order' => 4,
        ]);
        
        $otherCategory = SkillCategory::create([
            'name' => 'Inne',
            'order' => 5,
        ]);

        $skills = [
            [
                'name' => 'PHP',
                'slug' => 'php',
                'level' => 5,
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'level' => 5,
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'TypeScript',
                'slug' => 'typescript',
                'level' => 4,
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'HTML',
                'slug' => 'html',
                'level' => 5,
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'CSS',
                'slug' => 'css',
                'level' => 5,
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'SQL',
                'slug' => 'sql',
                'level' => 4,
                'skill_category_id' => $languagesCategory->id,
            ],
            
            // Frameworki/Biblioteki (Frameworks/Libraries)
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'level' => 5,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Octane',
                'slug' => 'laravel-octane',
                'level' => 4,
                'image' => 'laravel-octane.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Horizon',
                'slug' => 'laravel-horizon',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Socialite',
                'slug' => 'laravel-socialite',
                'level' => 4,               
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Telescope',
                'slug' => 'laravel-telescope',
                    'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Vue.js',
                'slug' => 'vuejs',
                'level' => 5,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Nuxt.js',
                'slug' => 'nuxtjs',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'React Native',
                'slug' => 'react-native',
                'level' => 3,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'React.js',
                'slug' => 'reactjs',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Node.js',
                'slug' => 'nodejs',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Inertia',
                'slug' => 'inertia',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'TailwindCSS',
                'slug' => 'tailwindcss',
                'level' => 5,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'FilamentPHP',
                'slug' => 'filamentphp',
                'level' => 4,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Socket.io',
                'slug' => 'socketio',
                'level' => 3,
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'SASS',
                'slug' => 'sass',
                'level' => 4,           
                'skill_category_id' => $frameworksCategory->id,
            ],
            
            // Bazy danych (Databases)
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
                'level' => 4,
                'skill_category_id' => $databasesCategory->id,
            ],
            [
                'name' => 'Redis',
                'slug' => 'redis',
                'level' => 4,
                'skill_category_id' => $databasesCategory->id,
            ],
            [
                'name' => 'SQLite',
                'slug' => 'sqlite',
                    'level' => 4,
                'skill_category_id' => $databasesCategory->id,
            ],
            
            // Narzędzia (Tools)
            [
                'name' => 'Git',
                'slug' => 'git',
                'level' => 5,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Docker',
                'slug' => 'docker',
                'level' => 4,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Cursor',
                'slug' => 'cursor',
                'level' => 4,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'n8n',
                'slug' => 'n8n',
                'level' => 3,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Nginx',
                'slug' => 'nginx',
                'level' => 4,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Linux',
                'slug' => 'linux',
                'level' => 4,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'AWS',
                'slug' => 'aws',
                'level' => 2,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Jira',
                'slug' => 'jira',
                'level' => 3,
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Google Workspace',
                'slug' => 'google-workspace',
                'level' => 4,
                'skill_category_id' => $toolsCategory->id,
            ],
        ];

        foreach ($skills as $order => $skill) {
            $skillModel = Skill::create([
                'name' => $skill['name'],
                'level' => $skill['level'],
                'slug' => $skill['slug'],
                'order' => $order,
                'is_hidden' => $skill['is_hidden'] ?? false,
                'skill_category_id' => $skill['skill_category_id'],
            ]);
            $skillModel->addMedia(storage_path("seeder/skills/{$skill['image']}.svg"))->preservingOriginal()->toMediaCollection('skills');
        }
    }
}

