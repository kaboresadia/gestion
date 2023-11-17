<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
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
});

require __DIR__.'/auth.php';
