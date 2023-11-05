<?php

namespace App\Http\Controllers;

class LanguageController extends Controller {

    public function index() {
        $locale = request()->get('locale');
        app()->setLocale($locale);
        session()->put('local', $locale);

        return redirect()->back();
    }
}
