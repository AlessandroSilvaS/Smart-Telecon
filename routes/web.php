<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ShowDocumentController;
use App\Http\Controllers\UserPlanController;

//root

Route::get('/', [CardsController::class, 'index']);

//adm

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/administer', function () {
        return view('presentation.administer');
    });
});

//provider

Route::get('/provider', [UserPlanController::class, 'showTable'])->middleware(['auth'])->name('provider');

Route::post('/provider/store', [UserPlanController::class, 'store'])->middleware(['auth'])->name('provider.store');

Route::delete('/provider/removePlan/{id}',[UserPlanController::class, 'removePlan'])->middleware(['auth'])->name('provider.removePlan');

Route::put('/provider/alterPlans/{id}', [UserPlanController::class, 'update'])->middleware(['auth'])->name('provider.update');

Route::get('/plan/{id}/details', function ($id) {
    $planItem = App\Models\UserPlan::find($id);
    if ($planItem) {
        return response()->json($planItem);
    } else {
        return response()->json(['error' => 'Plano não encontrado'], 404);
    }
});

//contract

Route::get('/provider/detailsDocument', function(){

    return view('presentation.detailsDocument');

})->name('presentation.detailsDocument');

Route::get('/provider/previewDocument', [ShowDocumentController::class, 'showdocument'])->name('presentation.previewDocument');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});