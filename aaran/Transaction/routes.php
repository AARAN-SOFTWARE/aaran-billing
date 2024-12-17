<?php

use Illuminate\Support\Facades\Route;

//Transaction
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('trans/{id}/print', App\Http\Controllers\Transaction\TransController::class)->name('trans.print');


    Route::get('accBooks', \App\Livewire\Transaction\AccountBook\Index::class)->name('accBooks');

    Route::get('bankBooks/{id?}', \App\Livewire\Transaction\AccountBook\Index::class)->name('bankBooks');
    Route::get('cashBooks/{id?}', \App\Livewire\Transaction\AccountBook\Index::class)->name('cashBooks');

    Route::get('reports/{id?}', App\Livewire\Reports\Transaction\Bank::class)->name('reports');
    Route::get('cashReports/{id?}', App\Livewire\Reports\Transaction\Bank::class)->name('cashReports');


});
