<?php

namespace Database\Seeders;

use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'position' => ['en' => 'Web Developer', 'pl' => 'Web Developer'],
                'period' => '05.2022 - 06.2025',
                'company' => 'FlightScope',
                'location' => 'Gliwice, Poland',
                'responsibilities' => [
                    ['en' => 'Development of clean PHP backend with API for mobile and web applications', 'pl' => 'Rozwój czystego backendu PHP z API dla aplikacji mobilnych i webowych'],
                    ['en' => 'Maintaining and implementing new functionalities in Vue.js portal for baseball, collaborating with backend team', 'pl' => 'Utrzymywanie i wdrażanie nowych funkcjonalności w portalu Vue.js dla baseballu, we współpracy z zespołem backendowym'],
                    ['en' => 'Backend development in Laravel framework for Unity game integrating with golf radar', 'pl' => 'Rozwój backendu w frameworku Laravel dla gry Unity integrującej się z radarem golfowym'],
                    ['en' => 'Implementation of rotation leagues with leaderboards', 'pl' => 'Implementacja lig rotacyjnych z tabelami wyników'],
                    ['en' => 'Asynchronous task processing using Redis queue mechanism', 'pl' => 'Asynchroniczne przetwarzanie zadań z wykorzystaniem mechanizmu kolejek Redis'],
                    ['en' => 'Game economy system', 'pl' => 'System ekonomii w grze'],
                    ['en' => 'Cyclical rewards system', 'pl' => 'System cyklicznych nagród'],
                    ['en' => 'Bots simulating real player gameplay', 'pl' => 'Boty symulujące rozgrywkę prawdziwych graczy'],
                    ['en' => 'Golf card collections for boundary collection', 'pl' => 'Kolekcje kart golfowych do zbierania'],
                    ['en' => 'WebSocket server communication for real-time game modes', 'pl' => 'Komunikacja z serwerem WebSocket dla trybów gry w czasie rzeczywistym'],
                    ['en' => 'Discord-integrated feedback system', 'pl' => 'Zintegrowany z Discordem system informacji zwrotnej'],
                    ['en' => 'Personal backend service development using Socket.io WebSocket connections for real-time game modes', 'pl' => 'Rozwój osobistego serwisu backendowego z wykorzystaniem połączeń WebSocket Socket.io dla trybów gry w czasie rzeczywistym'],
                    ['en' => 'Creation and maintenance of administrative panel for user management', 'pl' => 'Tworzenie i utrzymanie panelu administracyjnego do zarządzania użytkownikami'],
                    ['en' => 'R&D of React Native mobile application integrating with golf radar SDK and WebGL browser project', 'pl' => 'Prace badawczo-rozwojowe nad aplikacją mobilną React Native integrującą się z SDK radaru golfowego i projektem przeglądarkowym WebGL'],
                    ['en' => 'DevOps tasks including custom Docker image creation for Bitbucket Pipelines', 'pl' => 'Zadania DevOps, w tym tworzenie niestandardowych obrazów Docker dla Bitbucket Pipelines'],
                    ['en' => 'Technical API documentation creation and automation using OpenAPI and JSON Schema standards', 'pl' => 'Tworzenie i automatyzacja technicznej dokumentacji API z wykorzystaniem standardów OpenAPI i JSON Schema'],
                ],
                'technologies' => ['PHP', 'Laravel', 'Vue.js', 'Redis', 'WebSocket', 'Socket.io', 'React Native', 'Docker', 'Unity', 'WebGL'],
            ],
            [
                'position' => ['en' => 'Junior Backend Developer', 'pl' => 'Młodszy Backend Developer'],
                'period' => '08.2021 - 04.2022',
                'company' => 'Arris Agency',
                'location' => 'Chorzów, Poland',
                'responsibilities' => [
                    ['en' => 'Development of tools for managing car advertisements and synchronizing them between services like Allegro, Otomoto, and Gratka', 'pl' => 'Rozwój narzędzi do zarządzania ogłoszeniami samochodowymi i ich synchronizacji między serwisami takimi jak Allegro, Otomoto i Gratka'],
                ],
                'technologies' => ['PHP', 'API Integration'],
            ],
            [
                'position' => ['en' => 'Web Developer Internship', 'pl' => 'Stażysta Web Developer'],
                'period' => '07.2021 - 08.2021',
                'company' => 'Merchandising Malaga SL',
                'location' => 'Malaga, Spain',
                'responsibilities' => [
                    ['en' => 'Creating wholesale product ordering forms using HTML, CSS and Alpine.js', 'pl' => 'Tworzenie formularzy zamówień hurtowych produktów przy użyciu HTML, CSS i Alpine.js'],
                ],
                'technologies' => ['HTML', 'CSS', 'Alpine.js'],
            ],
            [
                'position' => ['en' => 'Web Solutions Developer', 'pl' => 'Deweloper Rozwiązań Internetowych'],
                'period' => '07.2020 - 08.2020',
                'company' => 'Information Technology Center',
                'location' => 'Gliwice, Poland',
                'responsibilities' => [
                    ['en' => 'Development of CRM project written in Laravel', 'pl' => 'Rozwój projektu CRM napisanego w Laravelu'],
                ],
                'technologies' => ['Laravel', 'PHP'],
            ],
        ];

        foreach (array_reverse($experiences) as $exp) {
            [$start, $end] = array_map(fn ($p) => Carbon::createFromFormat('m.Y', $p)->startOfMonth(), explode(' - ', $exp['period']));

            $experience = Experience::create([
                'position' => $exp['position'],
                'company' => $exp['company'],
                'location' => $exp['location'],
                'started_at' => $start,
                'ended_at' => $end,
                'technologies' => $exp['technologies'] ?? null,
            ]);

            if (isset($exp['responsibilities'])) {
                foreach ($exp['responsibilities'] as $respIndex => $responsibility) {
                    $experience->entries()->create([
                        'description' => $responsibility,
                        'order' => $respIndex + 1,
                    ]);
                }
            }
        }
    }
}
