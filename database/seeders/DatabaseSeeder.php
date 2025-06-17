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
            'name' => 'Admin',
            'email' => config('app.admin.email'),
            'password' => Hash::make(config('app.admin.password')),
        ]);

        $this->call([
            SkillSeeder::class,
            ProjectSeeder::class,
            ExperienceSeeder::class,
            ResumeSeeder::class,
        ]);
    }
}
