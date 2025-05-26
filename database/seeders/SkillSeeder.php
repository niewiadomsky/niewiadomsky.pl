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
                'level' => 5,
                'image' => 'php.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'JavaScript',
                'level' => 5,
                'image' => 'javascript.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'TypeScript',
                'level' => 4,
                'image' => 'typescript.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'HTML',
                'level' => 5,
                'image' => 'html.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'CSS',
                'level' => 5,
                'image' => 'css.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            [
                'name' => 'SQL',
                'level' => 4,
                'image' => 'sql.svg',
                'skill_category_id' => $languagesCategory->id,
            ],
            
            // Frameworki/Biblioteki (Frameworks/Libraries)
            [
                'name' => 'Laravel',
                'level' => 5,
                'image' => 'laravel.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Octane',
                'level' => 4,
                'image' => 'laravel-octane.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Horizon',
                'level' => 4,
                'image' => 'laravel-horizon.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Socialite',
                'level' => 4,
                'image' => 'laravel-socialite.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Laravel Telescope',
                'level' => 4,
                'image' => 'laravel-telescope.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Vue.js',
                'level' => 5,
                'image' => 'vue.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Nuxt.js',
                'level' => 4,
                'image' => 'nuxt.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'React Native',
                'level' => 3,
                'image' => 'react-native.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'React.js',
                'level' => 4,
                'image' => 'react.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Node.js',
                'level' => 4,
                'image' => 'nodejs.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Inertia',
                'level' => 4,
                'image' => 'inertia.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'TailwindCSS',
                'level' => 5,
                'image' => 'tailwind.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'FilamentPHP',
                'level' => 4,
                'image' => 'filament.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            [
                'name' => 'Socket.io',
                'level' => 3,
                'image' => 'socket.svg',
                'skill_category_id' => $frameworksCategory->id,
            ],
            
            // Bazy danych (Databases)
            [
                'name' => 'MySQL',
                'level' => 4,
                'image' => 'mysql.svg',
                'skill_category_id' => $databasesCategory->id,
            ],
            [
                'name' => 'Redis',
                'level' => 4,
                'image' => 'redis.svg',
                'skill_category_id' => $databasesCategory->id,
            ],
            [
                'name' => 'SQLite',
                'level' => 4,
                'image' => 'sqlite.svg',
                'skill_category_id' => $databasesCategory->id,
            ],
            
            // Narzędzia (Tools)
            [
                'name' => 'Git',
                'level' => 5,
                'image' => 'git.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Docker',
                'level' => 4,
                'image' => 'docker.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Cursor',
                'level' => 4,
                'image' => 'cursor.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'n8n',
                'level' => 3,
                'image' => 'n8n.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Nginx',
                'level' => 4,
                'image' => 'nginx.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Linux',
                'level' => 4,
                'image' => 'linux.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'AWS',
                'level' => 2,
                'image' => 'aws.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Jira',
                'level' => 3,
                'image' => 'jira.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
            [
                'name' => 'Google Workspace',
                'level' => 4,
                'image' => 'google-workspace.svg',
                'skill_category_id' => $toolsCategory->id,
            ],
        ];

        foreach ($skills as $order => $skill) {
            $skillModel = Skill::create([
                'name' => $skill['name'],
                'level' => $skill['level'],
                'order' => $order,
                'hidden' => $skill['hidden'] ?? false,
                'skill_category_id' => $skill['skill_category_id'],
            ]);
            $skillModel->addMedia(storage_path('seeder/skills/' . $skill['image']))->preservingOriginal()->toMediaCollection('skills');
        }
    }
}

