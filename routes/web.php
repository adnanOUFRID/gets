<?php

use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::resource('/tache',TacheController::class);

Route::get('/tache/statut/{id}',[TacheController::class, 'statut'])->name('tache.statut');

