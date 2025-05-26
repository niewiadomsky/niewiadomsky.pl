<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        $project->load('media');

        return Inertia::render('Project', [
            'project' => new ProjectResource($project),
        ]);
    }
} 