<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Szymon Niewiadomski',
            'email' => 'niewiadomski.szymon@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            SkillSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
