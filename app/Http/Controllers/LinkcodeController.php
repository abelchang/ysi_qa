<?php

namespace App\Http\Controllers;

use App\Models\Linkcode;
use Illuminate\Http\Request;

class LinkcodeController extends Controller
{
    //
    public function show(Request $request)
    {
        $code = $request->code;
        $linkcode = Linkcode::where('code', $code)->firstOrFail();
        $project = $linkcode->project;
        $qa = $project->qa;

        return view('qa.show', ['linkcode' => $linkcode, 'project' => $project, 'qa' => $qa]);
    }
}
