<?php

namespace App\Http\Controllers;

use App\Models\Qsample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QsampleController extends Controller
{
    public function getAll(Request $request)
    {
        if (Auth::check()) {
            $samples = Qsample::orderBy('updated_at', 'desc')->get();
            return response()->json([
                'success' => true,
                'samples' => $samples,
            ]);
        }

    }
}
