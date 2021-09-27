<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function getAll(Request $request)
    {
        if (Auth::id()) {

            $companies = Company::get();
            return response()->json([
                'success' => true,
                'companies' => $companies,
            ]);
        }
    }

    public function save(Request $request)
    {
        if (Auth::id()) {
            $company = $request->company;
            $companyUpdate = Company::updateOrCreate(['name' => $company['name']], $company);
            return response()->json([
                'success' => true,
                'company' => $companyUpdate,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to update company',
            ]);
        }
    }
}
