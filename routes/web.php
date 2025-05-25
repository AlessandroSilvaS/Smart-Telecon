<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CardController;

Route::get('/', function () {
    return view('presentation.index');
});

Route::get('/provider', function () {
    return view('presentation.provider');
});

Route::get('/presentation', [CardController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
