<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            $projectData = $request->project;
            $companyData = $request->project['company'];
            $qaData = $request->project['qa'];
            $company = Company::updateOrCreate(['name' => $companyData['name']], $companyData);
            $projectData['company_id'] = $company->id;
            $project = Project::updateOrCreate(['id' => $projectData['id']], $projectData)->with('company', 'answers', 'linkCodes', 'qa')->first();
            if ($qaData != null) {
                $project->qa()->create($qaData);
            }
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

    public function getAll(Request $request)
    {
        if (Auth::check()) {
            $projects = Project::with('company', 'answers', 'linkCodes', 'qa')->orderBy('start', 'desc')->get();
            return response()->json([
                'success' => true,
                'projects' => $projects,
            ]);
        }

    }
}
