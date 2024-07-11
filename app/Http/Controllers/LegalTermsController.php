<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class LegalTermsController extends Controller
{

    public function showPrivacyPolicy()
    {
        $privacyPolicy = DB::table('legal_terms')
                            ->where('category_type', 'Privacy Policy')
                            ->first();

        return view('privacy_policy', ['privacyPolicy' => $privacyPolicy]);
    }

    public function showTermsCondition()
    {
        $termsConditions = DB::table('legal_terms')
                            ->where('category_type', 'Terms and Conditions')
                            ->get()
                            ->toArray();
    
        return view('terms_conditions', ['termsConditions' => $termsConditions]);
    }
    


}