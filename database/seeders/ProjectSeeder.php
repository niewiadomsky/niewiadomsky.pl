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
                'name' => [
                    'pl' => 'Niewiadomscy Ranch',
                    'en' => 'Niewiadomscy Ranch',
                ],
                'description' => [
                    'pl' => 'Strona mojej stajni, na której można umawiać jazdy online. Wewnętrzne narzędzie do zarządzania stajnią i jazdami. Synchronizuje jazdy z kalendarzem Google i przyjmuje webhooki z systemu rezerwacji Cal.com. Podlicza statystyki i powiadamia mnie o rezerwacji za pomocą Telegrama.',
                    'en' => 'My stable\'s website, where you can book rides online. An internal tool for managing the stable and rides. It synchronizes rides with Google Calendar and accepts webhooks from the Cal.com booking system. It calculates statistics and notifies me about reservations via Telegram.',
                ],
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
                'name' => [
                    'pl' => 'Narzędzie dla szwalni',
                    'en' => 'Tool for a sewing factory',
                ],
                'description' => [
                    'pl' => 'Dedykowane narzędzie do zarządzania zamówieniami, produktami i produkcją szwalni. Generowanie dokumentów PDF do wydruku. Obliczanie czasu realizacji zamówienia. Ustawianie priorytetów i statusów zamówień.',
                    'en' => 'A dedicated tool for managing orders, products, and production in a sewing factory. Generating PDF documents for printing. Calculating order completion time. Setting order priorities and statuses.',
                ],
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
                'name' => [
                    'pl' => 'FameCraft',
                    'en' => 'FameCraft',
                ],
                'description' => [
                    'pl' => 'Strona serwera Minecraft, na której można kupować wirtualną walutę. Admin panel pisany od zera. Backend zintegrowany z bazą serwera do pobierania informacji o graczach i ich statystykach. Możliwość wysyłania ticketów supportowych na Discorda z poziomu weba. Komunikacja z serwerem Minecraft za pomocą protokołu RCON.',
                    'en' => 'Minecraft server website where you can buy virtual currency. Admin panel written from scratch. Backend integrated with the server database to retrieve player information and statistics. Ability to send support tickets to Discord from the web level. Communication with the Minecraft server using the RCON protocol.',
                ],
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
                'name' => [
                    'pl' => 'Pokemon Fire Red Battle',
                    'en' => 'Pokemon Fire Red Battle',
                ],
                'description' => [
                    'pl' => 'Odwzorowany główny system walki z gier Pokemon Fire Red i Emerald. Sterowanie jak symulatorach gier Game Boy. Strzałkami zmienia się wybór opcji, Przycisk Z wybiera akcję, a X cofa do menu. Przytrzymując spację, gra przyspiesza.',
                    'en' => 'Recreation of the main battle system from the Pokemon Fire Red and Emerald games. Controls are like Game Boy game simulators. Arrow keys change option selection, Z button selects an action, and X goes back to the menu. Holding the space bar speeds up the game.',
                ],
                'live_url' => 'https://pokemon-gameboy.netlify.app',
                'iframe_url' => 'https://pokemon-gameboy.netlify.app',
                'github_url' => 'https://github.com/niewiadomsky/pokemon-game',
                'order' => 4,
                'skills' => ['vuejs', 'tailwindcss', 'nuxtjs', 'javascript', 'sass'],
                'created_year' => 2021,
                'is_commercial' => false,
                'is_open_source' => true,
                'is_hidden' => true,
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
