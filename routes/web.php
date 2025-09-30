<?php

use App\Http\Controllers\DispatchAgreementController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DispatchAgreementController::class, 'create'])->name('agreements.create');
Route::post('/agreements', [DispatchAgreementController::class, 'store'])->name('agreements.store');
Route::get('/agreements/{id}', [DispatchAgreementController::class, 'show'])->name('agreements.show');
Route::get('/agreements/{id}/pdf', [DispatchAgreementController::class, 'downloadPdf'])->name('agreements.pdf');

//see all agreements

Route::get('/agreements', [DispatchAgreementController::class, 'index'])->name('agreements.index');
