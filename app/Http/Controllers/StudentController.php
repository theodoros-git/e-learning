<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // fonction d'inscription pour l'élève
    public function logup() {

        return view('inscription.students.logup');
    }


    // fonction de traitement de formulaire inscription eleves
    public function logup_form(Request $request) {

        $request->validate([
            'nom' => 'required|max:255|string',
            'prenom' => 'required|max:255|string',
            'ecole' => 'required|max:255|string',
            'niveau' => 'required|max:255',
            'email_tel' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'sexe' => 'required|max:255|string',
            'password' => 'required|min:6|max:10',
            'confirm_password' => 'required|same:password|min:6|max:10',
        ]);

        session([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'ecole' => $request->ecole,
            'niveau' => $request->niveau,
            'email_tel' => $request->email_tel,
            'username' => $request->username,
            'sexe' => $request->sexe,
            'password' => $request->password,
            
        ]);


        return view('inscription.students.confirm_logup');

    }

    // fonction pour la connection de l'élève
    public function login() {

        return view('connection.students.login');
    }
}
