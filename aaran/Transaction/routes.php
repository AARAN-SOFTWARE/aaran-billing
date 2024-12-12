<?php

use Illuminate\Support\Facades\Route;

//Transaction
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

//    Route::get('/sales', App\Livewire\Entries\Sales\Index::class)->name('sales');
    Route::get('trans/{id}', App\Livewire\Transaction\Index::class)->name('trans');
    Route::get('trans/{id}/print', App\Http\Controllers\Transaction\TransController::class)->name('trans.print');

    Route::get('accBooks', App\Livewire\Transaction\AccountBook\Index::class)->name('accBooks');
    Route::get('bankBooks', App\Livewire\Transaction\Books\BankBook::class)->name('bankBooks');
    Route::get('cashBooks', App\Livewire\Transaction\Books\CashBook::class)->name('cashBooks');
    Route::get('bankReports/{id}', App\Livewire\Reports\Transaction\Bank::class)->name('bankReports');
    Route::get('cashReports/{id}', App\Livewire\Reports\Transaction\Cash::class)->name('cashReports');
//    Route::get('transactions/{id}', App\Livewire\Entries\Payment\Index::class)->name('transactions');


});
