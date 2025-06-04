<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;

Route::get('/', [CardsController::class, 'index']);

Route::get('/provider', function () {
    return view('presentation.provider');
})->middleware(['auth'])->name('provider');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administer', function () {
        return view('presentation.administer');
    });
});

Route::get('/provider/createDocument', function(){
    return view('presentation.createDocument');
})->name('presentation.createDocument');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
