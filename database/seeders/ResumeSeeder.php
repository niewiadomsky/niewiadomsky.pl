<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $englishResume = Resume::create([
            'name' => 'english-cv-szymon-niewiadomski.pdf',
            'language' => 'en',
            'is_active' => true,
        ]);

        $englishResume->addMedia(storage_path('seeder/resumes/cv-english.pdf'))->preservingOriginal()->toMediaCollection('resumes');

        $polishResume = Resume::create([
            'name' => 'polish-cv-szymon-niewiadomski.pdf',
            'language' => 'pl',
            'is_active' => true,
        ]);

        $polishResume->addMedia(storage_path('seeder/resumes/cv-polish.pdf'))->preservingOriginal()->toMediaCollection('resumes');
    }
}
