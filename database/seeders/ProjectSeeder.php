<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Niewiadomscy Ranch',
                'description' => 'Strona mojej stajni, na której można umawiać jazdy online. Wewnętrzne narzędzie do zarządzania stajnią i jazdami. Synchronizuje jazdy z kalendarzem Google i przyjmuje webhooki z systemu rezerwacji Cal.com. Podlicza statystyki i powiadamia mnie o rezerwacji za pomocą Telegrama.',
                'live_url' => 'https://niewiadomscyranch.pl',
                'github_url' => null,
                'iframe_url' => null,
                'order' => 1,
                'skills' => ['laravel', 'nuxtjs', 'inertia', 'tailwindcss', 'php', 'javascript', 'mysql', 'vuejs', 'n8n'],
                'created_year' => 2024,
                'is_commercial' => true,
                'is_open_source' => false,
                'media_folder' => 'projects/niewiadomscyranch',
            ],
            [
                'name' => 'Narzędzie dla szwalni',
                'description' => 'Dedykowane narzędzie do zarządzania zamówieniami, produktami i produkcją szwalni. Generowanie dokumentów PDF do wydruku. Obliczanie czasu realizacji zamówienia. Ustawianie priorytetów i statusów zamówień.',
                'live_url' => null,
                'github_url' => null,
                'iframe_url' => null,
                'order' => 2,
                'skills' => ['laravel', 'tailwindcss', 'filamentphp', 'php', 'mysql'],
                'created_year' => 2023,
                'is_commercial' => true,
                'is_open_source' => false,
                'media_folder' => 'projects/szwalnia',
            ],
            [
                'name' => 'FameCraft',
                'description' => 'Strona serwera Minecraft, na której można kupować wirtualną walutę. Admin panel pisany od zera. Backend zintegrowany z bazą serwera do pobierania informacji o graczach i ich statystykach. Możliwość wysyłania ticketów supportowych na Discorda z poziomu weba. Komunikacja z serwerem Minecraft za pomocą protokołu RCON.',
                'live_url' => null,
                'github_url' => null,
                'iframe_url' => null,
                'order' => 3,       
                'skills' => ['laravel', 'mysql', 'php', 'javascript', 'html', 'css'],
                'created_year' => 2020,
                'is_commercial' => true,    
                'is_open_source' => true,
                'media_folder' => 'projects/famecraft',
            ],
            [
                'name' => 'Pokemon Fire Red Battle',
                'description' => 'Odwzorowany główny system walki z gier Pokemon Fire Red i Emerald. Sterowanie jak symulatorach gier Game Boy. Strzałkami zmienia się wybór opcji, Przycisk Z wybiera akcję, a X cofa do menu. Przytrzymując spację, gra przyspiesza.',
                'live_url' => 'https://pokemon-gameboy.netlify.app',
                'iframe_url' => 'https://pokemon-gameboy.netlify.app',
                'github_url' => 'https://github.com/niewiadomsky/pokemon-game',
                'order' => 4,
                'skills' => ['vuejs', 'tailwindcss', 'nuxtjs', 'javascript', 'sass'],
                'created_year' => 2021,
                'is_commercial' => false,
                'is_open_source' => true,
                'media_folder' => 'projects/pokemon-battle',
            ]
        ];

        $skills = Skill::all();
        Project::unguard(false);

        foreach ($projects as $projectData) {
            $skillNames = $projectData['skills'];
            
            $project = Project::create($projectData);
            $filteredSkills = $skills->whereIn('slug', $skillNames);
            $project->skills()->attach($filteredSkills->pluck('id'));

            collect(Storage::disk('seeder')->files($projectData['media_folder']))->each(function ($file) use ($project) {
                $project->addMedia(storage_path("seeder/$file"))->preservingOriginal()->toMediaCollection('projects');
            });
        }
    }
}
