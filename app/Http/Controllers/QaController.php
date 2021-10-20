<?php

namespace App\Http\Controllers;

use App\Models\Linkcode;
use App\Models\Qa;
use Illuminate\Http\Request;

class QaController extends Controller
{
    public function mongoTest(Request $res)
    {

        Qa::create(['title' => 'The Fault in Our Stars']);
        return response()->json([
            'success' => true,
        ]);

    }

    public function getQa(Request $request)
    {

        $code = $request->code;
        $linkcode = Linkcode::where('code', $code)->first();
        if ($linkcode != null) {
            $project = $linkcode->project;
            $qa = $project->qa;
            return response()->json([
                'success' => true,
                'qa' => $qa,
                'linkcode' => $linkcode,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'qa not find',
            ]);
        }

    }

}
