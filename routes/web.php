<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneralController;

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
