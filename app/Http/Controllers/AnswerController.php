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

        foreach ($request->answers as $answer) {
            Answer::updateOrCreate(['id' => $answer['id']], $answer);
        }
        $linkcode = Linkcode::find($request->answers['linkcode_id']);
        $linkcode->done += 1;
        $linkcode->save();

        return response()->json([
            'success' => true,
        ]);

    }

}
