<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage for both guests and authenticated users to view available pets
Route::get('/', [PetController::class, 'index'])->name('home');

// Dashboard route for authenticated users only
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// CRUD operations for pets (guests can view, authenticated users can create/edit/delete)
Route::resource('pets', PetController::class)->except(['index']);

// Route for showing individual pet details (for both guests and authenticated users)
Route::get('/pets/{pet}', [PetController::class, 'show'])->name('pets.show');

// Route to view the available pets (for guests and authenticated users)
Route::get('/pets', [PetController::class, 'index'])->name('pets.index'); // This ensures the pets index route is defined.

// Routes for authenticated users (profile management)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes for login, register, etc.
require __DIR__.'/auth.php';
