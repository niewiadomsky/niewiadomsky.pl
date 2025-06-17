<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function download(Resume $resume)
    {
        return response()->download($resume->getFirstMedia('resumes')->getPath(), $resume->name);
    }
}
