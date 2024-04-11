<?php

namespace App\Http\Controllers;

class LanguageController extends Controller {

    public function index() {
        // Az oldal felől jövő nyelvi beállítása
        $locale = request()->get('locale');
        // Applikáció nyelvi beállítás módosítása
        app()->setLocale($locale);
        // A session -be is eltárolom az új beállítást
        session()->put('locale', $locale);

        // visszairányítás
        return redirect()->back();
    }
}
