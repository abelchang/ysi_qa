<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::id()) {
            $projectData = $request->project;
            $project = Project::create($projectData);
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to create project',
            ]);
        }

    }
}
