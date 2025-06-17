<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExperienceResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ResumeResource;
use App\Http\Resources\SkillResource;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::with('media', 'category')->where('is_hidden', false)->orderBy('level', 'desc')->get();  
        $projects = Project::with('media', 'skills')->get();
        $experiences = Experience::with('entries')->orderBy('started_at', 'desc')->get();
        $resume = Resume::where('is_active', true)->where('language', app()->getLocale())->first();
        
        return Inertia::render('Home', [
            'skills' => SkillResource::collection($skills),
            'projects' => ProjectResource::collection($projects),
            'experiences' => ExperienceResource::collection($experiences),
            'resume' => ResumeResource::make($resume),
        ]);
    }
}