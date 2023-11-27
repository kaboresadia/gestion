<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProfilEmployerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PosteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/acceuil', [ClientController::class, 'form_register'])->name('acceuil');
    Route::get('/inscription', [ClientController::class, 'inscription'])->name('registration');
    
    Route::get('/register', [ClientController::class, 'form_register']);
    Route::post('/register/traitement', [ClientController::class, 'traitement_register']);
    Route::get('/liste', [ClientController::class, 'affissage'])->name('tableau');
    Route::get('/liste/{id}delete', [ClientController::class, 'delete'])->name('supprimer');
    
    Route::get('/liste/{id}edit', [ClientController::class, 'edit'])->name('modifier');
    Route::post('/updade/traitement', [ClientController::class, 'traitement_update']);
    
    Route::get('/liste/{id}detail', [ClientController::class, 'detail'])->name('detail');




   // Affichage de la liste des départements
   Route::get('departements/liste', [DepartementController::class, 'affichage'])->name('departements.liste');

  // Affichage du formulaire d'enregistrement
  Route::get('/departements/enregistrement', [DepartementController::class, 'form_register'])->name('departements.formulaire');

// Traitement de l'enregistrement
Route::post('/departements/enregistrement', [DepartementController::class, 'traitement_register'])->name('departements.enregistrement');
   
   
   // Affichage du formulaire d'édition
   Route::get('/modifier/{id}', [DepartementController::class, 'edit'])->name('departements.modifier');
   
   // Traitement de la mise à jour
   Route::post('/editer', [DepartementController::class, 'traitement_update'])->name('departements.traitement_update');
   
   // Suppression d'un département
   Route::get('/supprimer/{id}', [DepartementController::class, 'delete'])->name('departements.supprimer');
   
   // Affichage des détails d'un département
   Route::get('/detail/{id}', [DepartementController::class, 'detail'])->name('departements.detail');




// Affichage de la liste des profilsEmployer
Route::get('profilEmployers/liste', [ProfilEmployerController::class, 'affichage'])->name('profilEmployers.liste');

// Affichage du formulaire d'enregistrement
Route::get('/profilEmployers/enregistrement', [ProfilEmployerController::class, 'form_register'])->name('profilEmployers.formulaire');

// Traitement de l'enregistrement
Route::post('/profilEmployers/enregistrement', [ProfilEmployerController::class, 'traitement_register'])->name('profilEmployers.enregistrements');

// Affichage du formulaire d'édition
Route::get('/profilEmployers/modifier/{id}', [ProfilEmployerController::class, 'edit'])->name('profilEmployers.modifier');

// Traitement de la mise à jour
Route::post('/profilEmployers/editer', [ProfilEmployerController::class, 'traitement_update'])->name('profilEmployers.traitement_update');

// Suppression d'un profilEmployer
Route::get('/profilEmployers/supprimer/{id}', [ProfilEmployerController::class, 'delete'])->name('profilEmployers.supprimer');

// Affichage des détails d'un profilEmployer
Route::get('/profilEmployers/detail/{id}', [ProfilEmployerController::class, 'detail'])->name('profilEmployers.detail');







// Routes pour le PosteController
// Afficher la liste des postes
Route::get('/postes/liste', [PosteController::class, 'affichage'])->name('postes.liste');

// Page d'accueil des postes
Route::get('/postes/accueil', [PosteController::class, 'form_register'])->name('postes.accueil');

// Enregistrer un nouveau poste
Route::post('/postes/enregistrement', [PosteController::class, 'traitement_register']);

// Page d'édition des postes
Route::get('/postes/modifier/{id}', [PosteController::class, 'edit'])->name('postes.modifier');

// Actualiser un poste
Route::post('/postes/modifier/{id}', [PosteController::class, 'traitement_update'])->name('postes.update');

// Supprimer un poste
Route::get('/postes/supprimer/{id}', [PosteController::class, 'delete'])->name('postes.supprimer');

// Afficher les détails d'un poste
Route::get('/postes/detail/{id}', [PosteController::class, 'detail'])->name('postes.detail');




    
});

require __DIR__.'/auth.php';
