<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    
    // fonction de la page d'accueil
    public function index() {

        return view('pages.index');
    }
}
