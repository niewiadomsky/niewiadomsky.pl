<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\Project;
use App\Models\Skill;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::with('media')->get();  
        $projects = Project::with('media')->get();

        return Inertia::render('Home', [
            'skills' => SkillResource::collection($skills),
            'projects' => ProjectResource::collection($projects),
        ]);
    }
}