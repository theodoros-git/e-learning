<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // fonction d'inscription pour le professeur
    public function sign_up() {

        return view('inscription.teachers.sign_up');
    }


    // fonction pour la connection du professeur
    public function sign_in() {

        return view('connection.teachers.sign_in');
    }
}
