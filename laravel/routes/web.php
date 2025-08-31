<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get("/", [ClientController::class, "index"])->name('home');
Route::resource('clients', ClientController::class);
