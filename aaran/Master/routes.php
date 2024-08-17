<?php

use Illuminate\Support\Facades\Route;

//Master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/products', App\Livewire\Master\Product\Index::class)->name('products');

});
