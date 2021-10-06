<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // fonction d'inscription pour l'élève
    public function logup() {

        return view('inscription.students.logup');
    }


    // fonction pour la connection de l'élève
    public function login() {

        return view('connection.students.login');
    }
}
