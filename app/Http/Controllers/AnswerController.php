<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Linkcode;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //
    public function save(Request $request)
    {
        $linkcode = $request->linkcode;
        foreach ($request->answers as $answer) {
            Answer::updateOrCreate(['id' => $answer['id']], $answer);
        }
        Linkcode::where('id', $linkcode['id'])->update(['done' => $linkcode['done'] + 1]);

        return response()->json([
            'success' => true,
        ]);

    }

}
