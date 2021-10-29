<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

use App\Models\CategoryCourse;

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

            if (Auth()->user()->is_admin == True) {

                return view('dashboard.admin.dashboard');

            }

            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/admin/login');
    }

    public function category_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {


            return view('dashboard.admin.category_add');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function category_add_form(Request $request) {

        if (Auth::check()) {

            if (Auth()->user()->is_admin == True) {
            
                $request->validate([
                'category_course' => 'required|max:255',
                ]);


                $category_add = new CategoryCourse;

                $category_add->designation = $request->category_course;
                $category_add->created_by = Auth()->user()->username;

                $category_add->save();


                return redirect('/admin/dashboard')->withCategoryaddsuccess('Catégorie de cours créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }
            
        }


        return redirect('/admin/login');
    }

    public function category_modify() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $categories = CategoryCourse::all();


                return view('dashboard.admin.category_modify', [
                'categories' => $categories
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function category_modify_form(int $id, Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'category_course' => 'required|max:255',
                ]);

                $category = CategoryCourse::find($id);

                $category->designation = $request->category_course;

                $category->save();

                return redirect('/admin/dashboard')->withCategorymodifysuccess('Catégorie de cours modifiée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');

    }


    public function autorisation() {

        return view('errors.unautorised');
    }




    public function logout(Request $request) {
    
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
