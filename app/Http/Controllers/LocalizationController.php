<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\RedirectResponse;

class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse
     */

    // Va servir à changer la langue du site selon la sélection de l'utilisateur
    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
