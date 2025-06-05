<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ShowDocumentController;
use App\Http\Controllers\UserPlanController;

Route::get('/', [CardsController::class, 'index']);

Route::get('/provider', [UserPlanController::class, 'showTable'])->middleware(['auth'])->name('provider');
Route::post('/provider/store', [UserPlanController::class, 'store'])->middleware(['auth'])->name('provider.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administer', function () {
        return view('presentation.administer');
    });
});

Route::get('/provider/createDocument', [ShowDocumentController::class, 'showdocument'])->name('presentation.createDocument');


Route::get('/testes', function(){
    return view('presentation.teste');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});