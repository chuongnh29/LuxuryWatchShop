<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        Session::put('locale', $locale);
        return Redirect::back();
    }
}
