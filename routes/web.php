<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route pour la page d'accueil
Route::get('/unauthorized_user', [AdminController::class, 'autorisation'])
        ->name('unauthorized');


// Route pour la page d'accueil
Route::get('/', [GeneralController::class, 'index'])
        ->name('index');


// Route pour la page de contact 
Route::get('/contact/', [GeneralController::class, 'contact'])
        ->name('contact');


Route::post('/contact_form', [GeneralController::class, 'contact_form'])
        ->name('contact_form');


// Route pour la page de Qui sommes nous
Route::get('/qui_sommes_nous', [GeneralController::class, 'about'])
        ->name('about');



// Route pour la page d'inscription
Route::get('/inscription', [GeneralController::class, 'signup'])
        ->name('signup');



// Route pour la page de connection
Route::get('/connection', [GeneralController::class, 'signin'])
        ->name('signin');



// Groupe de route pour les professeurs
Route::prefix('teachers')->group(function () {

    // route pour l'inscription des professeurs
    Route::get('/sign_up', [TeacherController::class, 'sign_up'])
        ->name('sign_up');

    // route pour la connection
    Route::get('/sign_in', [TeacherController::class, 'sign_in'])
        ->name('sign_in');
        

});




// Groupe de route pour les students
Route::prefix('students')->group(function () {

    // route pour l'inscription des élèves
    Route::get('/log_up', [StudentController::class, 'logup'])
        ->name('logup');

    // route pour l'inscription des élèves post
    Route::post('/log_up_form', [StudentController::class, 'logup_form'])
        ->name('logup_form');

    


    // route pour l'inscription des élèves post confirmation
    Route::get('/log_up_confirmation_one', [StudentController::class, 'logup_form_confirmation_one'])
        ->name('logup_form_confirmation_one');

    Route::post('/log_up_confirmation', [StudentController::class, 'logup_confirmation'])
        ->name('logup_confirmation');

    // route pour la connection des élèves
    Route::get('/login', [StudentController::class, 'login'])
        ->name('login');

    Route::post('/login_form', [StudentController::class, 'login_form'])
        ->name('login_form');


    // route pour dashboard eleves
    Route::get('/dashboard', [StudentController::class, 'dashboard'])
        ->name('dashboard_students')
        ->middleware('auth');


    // route pour dashboard eleves
    Route::get('/courses', [StudentController::class, 'students_courses'])
        ->name('students_courses')
        ->middleware('auth');


    // route pour dashboard eleves
    Route::get('/my_tds', [StudentController::class, 'students_tds'])
        ->name('students_tds')
        ->middleware('auth');

    // route pour dashboard eleves
    Route::get('/my_challenges', [StudentController::class, 'students_challenges'])
        ->name('students_challenges')
        ->middleware('auth');


    // route pour dashboard eleves
    Route::get('/profil', [StudentController::class, 'students_profil'])
        ->name('students_profil')
        ->middleware('auth');

    // route pour dashboard eleves
    Route::get('/factures', [StudentController::class, 'students_factures'])
        ->name('students_factures')
        ->middleware('auth');

    // route pour dashboard eleves
    Route::get('/change_my_informations', [StudentController::class, 'students_change_informations'])
        ->name('students_change_informations')
        ->middleware('auth');


    // route pour dashboard eleves
    Route::get('/change_my_password', [StudentController::class, 'students_change_password'])
        ->name('students_change_password')
        ->middleware('auth');
        

});



// Groupe de route pour les admins
Route::prefix('admin')->group(function () {

    // route pour l'inscription des professeurs
    Route::get('/signup', [AdminController::class, 'signup'])
        ->name('admin_signup');

    // route pour la connection
    Route::post('/signup', [AdminController::class, 'signup_form'])
        ->name('admin_signup_form');

    // route pour la connection
    Route::get('/signup_confirmation', [AdminController::class, 'signup_confirmation'])
        ->name('admin_signup_confirmation');


    // route pour la connection
    Route::post('/signup_confirmation', [AdminController::class, 'signup_confirmation_form'])
        ->name('admin_signup_confirmation_form');


    // route pour la connection
    Route::get('/login', [AdminController::class, 'login'])
        ->name('admin_login');

    // route pour la connection
    Route::post('/login', [AdminController::class, 'login_form'])
        ->name('admin_login_form');

    // route pour la connection
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin_dashboard')
        ->middleware('auth');


    // route pour la connection
    Route::get('/ajouter_une_catégorie_de_cours', [AdminController::class, 'category_add'])
        ->name('admin_category_add')
        ->middleware('auth');

    // route pour la connection
    Route::post('/ajouter_une_catégorie_de_cours', [AdminController::class, 'category_add_form'])
        ->name('admin_category_add_form')
        ->middleware('auth');

    // route pour la connection
    Route::get('/modifier_une_catégorie_de_cours', [AdminController::class, 'category_modify'])
        ->name('admin_category_modify')
        ->middleware('auth');

    // route pour la connection
    Route::get('/logout', [AdminController::class, 'logout'])
        ->name('admin_logout');
        

});
