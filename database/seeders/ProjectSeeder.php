<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Niewiadomscy Ranch + admin panel',
                'description' => 'Strona mojej stajni, na której można umawiać jazdy online. Wewnętrzne narzędzie do zarządzania stajnią i jazdami. Synchronizuje jazdy z kalendarzem Google i przyjmuje webhooki z systemu rezerwacji Cal.com. Podlicza statystyki i powiadamia mnie o rezerwacji za pomocą Telegrama.',
                'url' => 'https://niewiadomscyranch.pl',
                'github_url' => null, // Private repository
                'order' => 1,
                'skills' => ['Laravel', 'Nuxt.js', 'Inertia', 'TailwindCSS', 'PHP', 'JavaScript', 'MySQL', 'Vue.js'],
            ],
            [
                'name' => 'Narzędzie dla szwalni',
                'description' => 'Dedykowane narzędzie do zarządzania zamówieniami, produktami i produkcją szwalni. Generowanie dokumentów PDF do wydruku. Obliczanie czasu realizacji zamówienia. Ustawianie priorytetów i statusów zamówień.',
                'url' => null, // Internal tool
                'github_url' => null, // Private repository
                'order' => 2,
                'skills' => ['Laravel', 'TailwindCSS', 'FilamentPHP', 'PHP', 'MySQL'],
            ],
            [
                'name' => 'FameCraft',
                'description' => 'Strona serwera Minecraft, na której można kupować wirtualną walutę. Admin panel pisany od zera. Backend zintegrowany z bazą serwera do pobierania informacji o graczach i ich statystykach. Możliwość wysyłania ticketów supportowych na Discorda z poziomu weba. Komunikacja z serwerem Minecraft za pomocą protokołu RCON.',
                'url' => null, // Server discontinued
                'github_url' => null, // Private repository
                'order' => 3,
                'skills' => ['Laravel', 'MySQL', 'PHP', 'JavaScript', 'HTML', 'CSS'],
            ],
        ];

        foreach ($projects as $projectData) {
            $skillNames = $projectData['skills'];
            unset($projectData['skills']);
            
            $project = Project::create($projectData);
            
            // Get skill IDs by names
            $skills = Skill::whereIn('name', $skillNames)->get();
            
            // Attach skills to project
            $project->skills()->attach($skills->pluck('id'));
        }
    }
}
