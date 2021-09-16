<?php

namespace App\Http\Controllers;

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
}
