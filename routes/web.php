<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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
        

});
