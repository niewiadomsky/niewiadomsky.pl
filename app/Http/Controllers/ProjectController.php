<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('media', 'skills')->orderBy('order')->get();

        return Inertia::render('projects/Index', [
            'projects' => ProjectResource::collection($projects),
        ]);
    }

    public function show(Project $project)
    {
        $project->load('media');

        return Inertia::render('projects/Project', [
            'project' => new ProjectResource($project),
        ]);
    }
} 