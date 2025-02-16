<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

// Route pour afficher le tableau de bord
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route::get('/dashboard', function () {
   // return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');




// Route pour afficher le profil (GET)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Route pour mettre à jour le profil (PUT)
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
