<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\Sa;
use App\Models\Sequence;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\functions\dateDiff;

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
        $student->abonnement_is_active = false;
        $student->save();

        $user = new User;

        $user->username = $username;
        $user->password = Hash::make($password);
        $user->is_student = True;
        $user->is_teacher = False;
        $user->is_admin = False;


        $user->save();


        return redirect('/students/login')->withSuccess('Votre inscription est validée avec succès. Veuillez donc vous connecter. Merci');

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

            $request->session()->regenerate();

            return redirect('/students/dashboard');
                        
        }

        else {

            return view('connection.students.login',[
                'message' => 'Identifiants incorrects. Veuillez réessayer',
            ]);
        }
    }



    public function dashboard() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                $student_abonnement_duration = abs($student->abonnement_date_start - $student->abonnement_date_end);

                $date1 = $student->abonnement_date_end;
                $date2 = $student->abonnement_date_start;

                $now = dateDiff($date1, $date2);

                return view('dashboard.students.dashboard', ['now' => $now, 
                'student' => $student_abonnement_duration ]);

            }

            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_courses() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $courses = Course::all();
                $number = $courses->count();
                return view('dashboard.students.courses', ['courses' => $courses, 'number' => $number]);

            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_tds() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.tds');
            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_challenges() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.challenges');

            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_profil() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.profil');
            }
            else {
                return view('errors.unautorised');
            }
        }

        return redirect('/students/login');
    }


    public function students_factures() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.factures');
            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_change_informations() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.change_informations');
            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function students_change_password() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.change_password');
            }
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }

    public function course_view(string $course) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $course_f = Course::where('designation', $course)->first();

                $course_id = $course_f->id;

                $course_sas = Course::find($course_id)->sas;
                $number = $course_sas->count();
                
                return view('dashboard.students.course_view', [
                'course_sas' => $course_sas,
                'number' => $number
                ]);
            }
            
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }


    public function sequence_view(int $id) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $sequences = Sa::find($id)->sequences;

                
                $number = $sequences->count();
                
                return view('dashboard.students.sequence_view', [
                'sequences' => $sequences,
                'number' => $number
                ]);
            }
            
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }

    public function activities_view(int $id) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $activites = Sequence::find($id)->activites;

                
                $number = $activites->count();
                
                return view('dashboard.students.activity_view', [
                'activites' => $activites,
                'number' => $number
                ]);
            }
            
            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/students/login');
    }
}
