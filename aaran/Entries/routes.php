<?php

use Illuminate\Support\Facades\Route;

//Entries
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/sales', App\Livewire\Entries\Sales\Index::class)->name('sales');
    Route::get('/sales/{id}/upsert', App\Livewire\Entries\Sales\Upsert::class)->name('sales.upsert');
    Route::get('/sales/{id}/eway', App\Livewire\Entries\Sales\EwayBill::class)->name('sales.eway');
    Route::get('/sales/{id}/einvoice', App\Livewire\Entries\Sales\Einvoice::class)->name('sales.einvoice');
    Route::get('/sales/{id}/print', App\Http\Controllers\Entries\Sales\InvoiceController::class)->name('sales.print');
    Route::get('/sales/{id}/invoice', App\Http\Controllers\Entries\Sales\InvController::class)->name('sales.invoice');

    Route::get('/purchase', App\Livewire\Entries\Purchase\Index::class)->name('purchase');
    Route::get('/purchase/{id}/upsert', App\Livewire\Entries\Purchase\Upsert::class)->name('purchase.upsert');

    Route::get('transactions/{id}', App\Livewire\Entries\Payment\Index::class)->name('transactions');
    Route::get('transactions/{id}/print', App\Http\Controllers\Transaction\PaymentController::class)->name('transactions.print');

    Route::get('/receviables', App\Livewire\Reports\Statement\Receivables::class)->name('receviables');
    Route::get('/payables', App\Livewire\Reports\Statement\Payables::class)->name('payables');
    Route::get('/salesMonthly', App\Livewire\Reports\Sales\MonthlyReport::class)->name('salesMonthly');
    Route::get('/gstReport', App\Livewire\Reports\Sales\GstReport::class)->name('gstReport');

    Route::get('/receviables/print/{party}/{start_date?}/{end_date?}', App\Http\Controllers\Report\ReceivablesController::class)->name('receviables.print');
    Route::get('/payables/print/{party}/{start_date?}/{end_date?}', App\Http\Controllers\Report\PayablesController::class)->name('payables.print');

    Route::get('/monthlyReport/print/{month?}/{year?}', App\Http\Controllers\Report\Sales\MOnthlyReportController::class)->name('monthlyReport.print');
    Route::get('/gstReport/print/{month?}/{year?}', App\Http\Controllers\Report\Sales\GstReportController::class)->name('gstReport.print');

//
//    Route::get('/purchases', App\Livewire\Entries\Purchase\Index::class)->name('purchases');
//    Route::get('/purchases/{id}/upsert', App\Livewire\Entries\Purchase\Upsert::class)->name('purchases.upsert');
//    Route::get('/purchases/{id}/print', App\Http\Controllers\Entries\Purchase\InvoiceController::class)->name('purchases.print');
//
//    Route::get('/receipts', App\Livewire\Entries\Receipt\Index::class)->name('receipts');
//    Route::get('/receipts/{id}/upsert', App\Livewire\Entries\Receipt\Upsert::class)->name('receipts.upsert');
//
//    Route::get('/payments', App\Livewire\Entries\Payment\Index::class)->name('payments');
//    Route::get('/payments/{id}/upsert', App\Livewire\Entries\Payment\Upsert::class)->name('payments.upsert');

});
