<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Student;
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

        

        return redirect('/students/log_up_confirmation_one',);

    }

    public function logup_form_confirmation_one() {


        $fullname = session('nom').' '.session('prenom');
        $ecole = session('ecole');
        $niveau = session('niveau');
        $email_tel = session('email_tel');
        $username = session('username');
        $sexe = session('sexe');
        
        return view('inscription.students.confirm_logup', [
            'nom' => $fullname,
            'ecole' => $ecole,
            'niveau' => $niveau,
            'username' => $username,
            'sexe' => $sexe,
            'email_tel' => $email_tel,
        ]);
    }


    // confirmation post
    public function logup_confirmation(Request $request) {

        $fullname = session('nom').' '.session('prenom');
        $ecole = session('ecole');
        $niveau = session('niveau');
        $email_tel = session('email_tel');
        $username = session('username');
        $sexe = session('sexe');
        $password = session('password');

        $student = new Student;

        $student->fullname = $fullname;
        $student->school = $ecole;
        $student->level = $niveau;
        $student->username = $username;
        $student->gender = $sexe;
        $student->password = $password;
        $student->email = $email_tel;
        $student->phone = $email_tel;
        $student->save();

        $user = new User;

        $user->username = $username;
        $user->password = Hash::make($password);
        $user->is_student = True;
        $user->is_teacher = False;

        $user->save();


        return redirect('/students/login')->withSuccess('Votre inscription est validée avec succès. Veuillez donc vous connecter. Merci');;

    }

    // fonction pour la connection de l'élève
    public function login() {

        return view('connection.students.login');
    }



    public function login_form(Request $request) {

        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:6|max:10',
            'remember' => '',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_student' => 1], $remember = $request->remember)) {

            return redirect('/students/login');
                        
        }

        else {

            return back()->withErrors([
                'message' => 'Identifiants incorrects. Veuillez réessayer',
            ]);
        }
    }


    public function dashboard() {

        if (Auth::check()) {
            
        }

        return redirect('/students/login');
    }
}
