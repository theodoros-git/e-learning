<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function signup() {

        return view('inscription.admin.index');
    }



    public function signup_form(Request $request) {


        $request->validate([
            'username' => 'required|max:255|unique:users',
            'password_admin' => 'required|min:6|max:10',
            'password_confirmation' => 'required|same:password_admin|min:6|max:10',
        ]);

        session([
            'username_admin' => $request->username,
            'password_admin' => $request->password_admin,
            
        ]);

        

        return redirect('/admin/signup_confirmation')->withConfirmation('Veuillez entrer le code de confirmation avant la validation du compte');


    }


    public function signup_confirmation() {

        return view('inscription.admin.confirmation');
    }


    public function signup_confirmation_form(Request $request) {

        $request->validate([
            'admin_confirmation' => 'required|max:255',
        ]);

        if ( $request->admin_confirmation == "123456789") {

            $username = session('username_admin');
            $password = session('password_admin');

            $user = new User;

            $user->username = $username;
            $user->password = Hash::make($password);
            $user->is_student = False;
            $user->is_teacher = False;
            $user->is_admin = True;

            $user->save();

            return redirect('/admin/login')->withSuccess('Compte Admin créé avec Succès. Veuillez vous connecter.');
        }

        else {

            return view('inscription.admin.confirmation',[
                'message' => 'Code de Confirmation Incorrect.Veuillez contacter l\'administrateur pour en savoir plus.' ,
            ]);

        }
    }


    public function login() {

        return view('connection.admin.login');
    }


    public function login_form(Request $request) {

        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:6|max:10',
            'remember' => '',
        ]);


        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_admin' => 1], $remember = $request->remember)) {

            $request->session()->regenerate();

            return redirect('/admin/dashboard');
                        
        }


        else {

            return view('connection.admin.login',[
                'message' => 'Identifiants incorrects. Veuillez réessayer',
            ]);
        }

    }


    public function dashboard() {

        if (Auth::check()) {


            return view('dashboard.admin.dashboard');
            
        }
    }
}
