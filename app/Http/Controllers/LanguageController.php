<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function index(){
        //$aa = request()->all();
        //\Log::info( print_r($aa, true) );
        $locale = request()->get('locale');
        app()->setLocale($locale);
        session()->put('local', $locale);
        
        return redirect()->back();
    }
}
