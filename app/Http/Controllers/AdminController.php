<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\Sequence;
use App\Models\Sa;
use App\Models\Activite;
use App\Models\Classe;
use App\Models\File;
use App\Models\ActiviteFile;
//use Illuminate\Support\Facades\Request;

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


    public function course_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $categories = CategoryCourse::all();
                $classes = Classe::all();
                return view('dashboard.admin.add_course', [
                'categories' => $categories,
                'classes' => $classes,
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function course_add_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'course_category' => 'required|max:255',
                'course_name' => 'required|max:255',
                'classe_course' => 'required|max:255',
                ]);

                $course = new Course;

                $course->designation = $request->course_name;
                $course->category_course_id = $request->course_category;
                $course->classe_id = $request->classe_course;
                $course->created_by = Auth()->user()->username;

                $course->save();

                return redirect('/admin/dashboard')->withCourseaddsuccess('Cours créé avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function sa_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $courses = Course::all();

                return view('dashboard.admin.add_sa', [
                'courses' => $courses
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function sa_add_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'sa_course' => 'required|max:255',
                'sa_name' => 'required|max:255',
                ]);

                $sa = new Sa;

                $sa->designation = $request->sa_name;
                $sa->course_id = $request->sa_course;
                $sa->created_by = Auth()->user()->username;

                $sa->save();

                return redirect('/admin/dashboard')->withSaaddsuccess('Situation d\'apprentissage créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function all_courses() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $courses = Course::all();
                $number = $courses->count();

                return view('dashboard.admin.all_courses', [
                'courses' => $courses,
                'number' => $number
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }




    public function seq_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $sas = Sa::all();

                return view('dashboard.admin.add_seq', [
                'sas' => $sas
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function seq_add_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'seq_sa' => 'required|max:255',
                'seq_name' => 'required|max:255',
                ]);

                $seq = new Sequence;

                $seq->designation = $request->seq_name;
                $seq->sa_id = $request->seq_sa;
                $seq->created_by = Auth()->user()->username;

                $seq->save();

                return redirect('/admin/dashboard')->withSeqaddsuccess('Séquence créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function activity_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $sequences = Sequence::all();

                return view('dashboard.admin.activity_add', [
                'sequences' => $sequences
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function activity_add_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'activity_name' => 'required|max:255',
                'activity_seq' => 'required|max:255',
                'file' => 'required|file|max:500000',
                'description' => '',

                ]);

                

                $file = $request->file('file');
                if ($file !== null) {
                    $filename =$file->getClientOriginalName().'.'.$file->extension();
                    $path = 'uploads';
                    $request->file->move($path, $filename);

                    $activity = new Activite;

                    $activity->designation = $request->activity_name;
                    $activity->sequence_id = $request->activity_seq;
                    $activity->url = $filename;
                    $activity->description = $request->description;
                    $activity->created_by = Auth()->user()->username;

                    $activity->save();
                }

                return redirect('/admin/dashboard')->withActivityaddsuccess('Activité créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }



    public function classe_add() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {


                return view('dashboard.admin.classe_add');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function classe_add_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'classe_name' => 'required|max:255',
                ]);

                $classe = new Classe;

                $classe->designation = $request->classe_name;
                $classe->created_by = Auth()->user()->username;

                $classe->save();

                return redirect('/admin/dashboard')->withClasseaddsuccess('Classe créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function classe_modify() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $classes = Classe::all();


                return view('dashboard.admin.classe_modify', [
                'classes' => $classes
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function classe_modify_form(int $id, Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'class' => 'required|max:255',
                ]);

                $classe = Classe::find($id);

                $classe->designation = $request->class;

                $classe->save();

                return redirect('/admin/dashboard')->withClassemodifysuccess('Classe  modifiée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');

    }


    public function all_classes() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $classes = Classe::all();

                $number = $classes->count();
                return view('dashboard.admin.all_classes', [
                'classes' => $classes,
                'number' => $number,
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }


    public function classe_delete(int $id, Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {


                $classe = Classe::find($id);

                $classe->delete();

                return redirect('/admin/all_classes')->withClassemodifysuccess('Classe  modifiée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');

    }


    public function upload_files() {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {


                $activites = Activite::all();

                return view('dashboard.admin.upload_files', [
                'activities' => $activites,
                ]);

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');

    }


    public function upload_files_form(Request $request) {

        if (Auth::check()) {


            if (Auth()->user()->is_admin == True) {

                $request->validate([
                'activity' => 'required|max:255',
                'files' => 'required|max:500000',

                ]);

                $activity = Activite::find($request->activity);

                foreach($request->file('files') as $file1) {
                    $filename1 =$file1->getClientOriginalName().'.'.$file1->extension();
                    $path1 = 'uploads/activity_files';
                    $file1->move($path1, $filename1);

                    $file_a = new File;
                    $file_a->url = $filename1;
                    $file_a->save();
                    
                    $file_u = new ActiviteFile;
                    $file_u->activite_id = $activity->id;
                    $file_u->file_id = $file_a->id;
                    $file_u->save();
                } 

                

                return redirect('/admin/dashboard')->withActivityaddsuccess('Activité créée avec succès.');

            }

            else {
                return view('errors.unautorised');
            }

        }

        return redirect('/admin/login');
    }

}
