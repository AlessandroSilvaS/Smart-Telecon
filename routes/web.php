<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ShowDocumentController;
use App\Http\Controllers\UserPlanController;
use App\Http\Controllers\dashboardController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserPlan;

//root

Route::get('/', [CardsController::class, 'index']);

//provider

Route::get('/export-table', function () {
    $plansPdf = UserPlan::all();
    $pdf = Pdf::loadView('presentation.pdfExport', compact('plansPdf'));

    return $pdf->download('plansPdf.pdf');
})->name('export.pdf');


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

Route::get('/provider/createDocument', [ShowDocumentController::class, 'showdocument'])->name('presentation.createDocument');
Route::post('/provider/generateDocument', [ShowDocumentController::class, 'generate'])->name('presentation.generateDocument');

Route::get('/teste', function(){
    return view('presentation.teste');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[dashboardController::class, 'upDashboard'])->name('dashboard');

    Route::get('/api/chart-plan-types', [dashboardController::class, 'chartPlanTypes']);
});