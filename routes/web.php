<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::resource('/contacts', ContactController::class);
Route::resource('/posts', PostController::class);
Route::get('/home', [ContactController::class, 'index'])->name('home');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contactcrud/edit/{id}', [ContactController::class, 'edit'])->name('contactcrud.edit');
Route::put('/contactcrud/update/{id}', [ContactController::class, 'update'])->name('contactcrud.update');

// Define route for deleting contacts
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::view('/', 'home')->name('home');

// Define other routes
Route::get('/biodata', function () {
    return view('biodata');
})->name('biodata');
