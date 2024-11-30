<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::get('/logbooks', App\Livewire\Logbook\Log\Index::class)->name('logbooks');
    Route::get('logs/{id}', App\Livewire\Logbook\CommonLog::class)->name('logs');
});
