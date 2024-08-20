<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', App\Livewire\Web\Home\Index::class)->name('home');
Route::get('/about', App\Livewire\Web\Home\About::class)->name('about');
Route::get('/contact', App\Livewire\Web\Home\Contact::class)->name('contact');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/elements', App\Livewire\Utilities\UiElements\Index::class)->name('elements');

    Route::get('/icons', App\Livewire\Utilities\Icon\Index::class)->name('icons');
    Route::get('/test', App\Livewire\Test\Index::class)->name('test');
});
