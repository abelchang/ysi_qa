<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Linkcode;
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
            $linkCodes = $request->project['linkcodes'];
            $company = Company::updateOrCreate(['name' => $companyData['name']], $companyData);
            $projectData['company_id'] = $company->id;
            $project = Project::updateOrCreate(['id' => $projectData['id']], $projectData);
            if ($qaData != null) {
                $project->qa()->updateOrCreate(['_id' => $qaData['_id']], $qaData);
                if ($linkCodes == null) {
                    for ($i = 0; $i < 2; $i++) {
                        $code = $this->generateRandomString();
                        while (Linkcode::where('code', $code)->exists()) {
                            $code = $this->generateRandomString();
                        }
                        $project->linkCodes()->create(['name' => '', 'count' => 0, 'code' => $code]);
                    }
                } else {
                    foreach ($request->project['linkcodes'] as $linkcode) {
                        $project->linkcodes()->updateOrCreate(['id' => $linkcode['id']], $linkcode);
                    }
                }
            }

            $project->company;
            $project->qa;
            $project->answers;
            $project->linkcodes;
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
            $projects = Project::with('company', 'answers', 'linkcodes', 'qa')->orderBy('start', 'desc')->get();
            return response()->json([
                'success' => true,
                'projects' => $projects,
            ]);
        }

    }

    private function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
