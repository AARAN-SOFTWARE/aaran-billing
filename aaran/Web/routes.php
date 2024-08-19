<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/homeslides', App\Livewire\Web\Slide\Index::class)->name('homeslides');
});
