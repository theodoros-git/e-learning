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
use App\Models\Classe;
use App\Models\Transactionabonn;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Student\Functions;

class StudentController extends Controller
{
    // fonction d'inscription pour l'élève
    public function logup() {

        $classes = Classe::all();
        return view('inscription.students.logup',[
                'classes' => $classes,
            ]);
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
        $classe_search = Classe::find(session('niveau'));
        $niveau = $classe_search->designation;
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
        $classe_search = Classe::find(session('niveau'));
        $niveau = $classe_search->designation;
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
        $student->classe_id = session('niveau');
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

    public function user_unauthorized() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('errors.unautorised');
           }

            else {
                return view('errors.unautorised');
            }
            
        }

        return redirect('/connection');
    }

    public function logout(Request $request) {
    
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function transaction_abonnement() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $public_key = $_ENV["KKIAPAY_PUBLIC_KEY"];
                $private_key = $_ENV["KKIAPAY_PRIVATE_KEY"];
                $secret = $_ENV["KKIAPAY_SECRET_KEY"];

                $kkiapay = new \Kkiapay\Kkiapay($public_key,
                                                $private_key, 
                                                $secret, );                              
                $transaction_id = $_GET['transaction_id'];
                $transaction = $kkiapay->verifyTransaction($transaction_id);

                if ($transaction->status == 'SUCCESS') {

                    $student_username = Auth()->user()->username;
                    $student = Student::where('username', $student_username)
                                                ->first();
                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = true;
                    $student_s->abonnement_date_start = now()->toDateTimeString();
                    $now = now()->toDateTimeString();
                    $student_s->abonnement_date_end = date("Y-m-d", strtotime("+31 day", strtotime($now)));
                    $student_s->save();

                    $new_transaction = new Transactionabonn;

                    $new_transaction->fullname = Auth()->user()->username;
                    $new_transaction->montant_paye = $transaction->amount;
                    $new_transaction->moyen_de_paiement = $transaction->source;
                    $new_transaction->transaction_id = $transaction->transactionId;
                    $new_transaction->pays = $transaction->country;
                    $new_transaction->student_id = $student_id;
                    $new_transaction->save();
                    redirect('students/dashboard')->withAbonnementsuccess('Abonnement activé avec succès.Merci pour votre confiance!!');

                }
            }

            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');

    }

    public function dashboard() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

                    $date1 = strtotime($student->abonnement_date_end);
                    $date2 = strtotime(now()->toDateTimeString());

                    $now = Functions::dateDiff($date1, $date2);

                    $secondes = $now['day'] * 60 *60 *24;

                    return view('dashboard.students.dashboard', ['secondes' => $secondes,
                    'date' => $date2, 
                    ]);
                }

                else {

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }
            }

            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_courses() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

                    $student_username = Auth()->user()->username;
                    $student = Student::where('username', $student_username)
                                                ->first();
                    $student_classe_id = $student->classe_id;
                    $courses = Classe::find($student_classe_id)->courses;
                    $number = $courses->count();
                    return view('dashboard.students.courses', ['courses' => $courses, 'number' => $number]);
                }

                else {

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }

            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_tds() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.tds');
            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_challenges() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

                    return view('dashboard.students.challenges');
                }

                else {

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }

            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_profil() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.profil');
            }
            else {

                return redirect('/students/non_a_student');

            }
        }

        return redirect('/connection');
    }


    public function students_factures() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {


                $transactions = Transactionabonn::where('fullname', Auth()->user()->username)->get();
                return view('dashboard.students.factures', [
                    'transactions' => $transactions,
                    ]);
            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_change_informations() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.change_informations');
            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function students_change_password() {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                return view('dashboard.students.change_password');
            }
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }

    public function course_view(string $course) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

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

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }
            }
            
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }


    public function sequence_view(int $id) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

                    $sequences = Sa::find($id)->sequences;

                    
                    $number = $sequences->count();
                    
                    return view('dashboard.students.sequence_view', [
                    'sequences' => $sequences,
                    'number' => $number
                    ]);
                }

                else {

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }
            }
            
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }

    public function activities_view(int $id) {

        if (Auth::check()) {

            if (Auth()->user()->is_student == True) {

                $username = Auth()->user()->username;

                $student = Student::where('username', $username)->first();

                if ($student->abonnement_is_active == true and $student->abonnement_date_end != now()->toDateTimeString() ) {

                    $activites = Sequence::find($id)->activites;

                    
                    $number = $activites->count();
                    
                    return view('dashboard.students.activity_view', [
                    'activites' => $activites,
                    'number' => $number
                    ]);
                }

                else {

                    $student_id = $student->id;
                    $student_s = Student::find($student_id);
                    $student_s->abonnement_is_active = false;
                    $student_s->save();
                    return redirect('students/unauthorized_user');
                }
            }
            
            else {

                return redirect('/students/non_a_student');

            }
            
        }

        return redirect('/connection');
    }
}
