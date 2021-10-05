<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    
    // fonction de la page d'accueil
    public function index() {

        return view('pages.index');
    }


    // fonction de la page de contact
    public function contact() {

        return view('pages.contact');
    }


    // fonction de la page de about
    public function about() {

        return view('pages.about');
    }


    // fonction de la page de about
    public function signup() {

        return view('inscription.index');
    }



    // fonction de traitement du formulaire de contact
    public function contact_form(Request $request) {


        $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|email|max:255',
            'objet' => 'required|max:255',
            'message' => 'required',
        ]);


    }
}
