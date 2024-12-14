<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CityController::class, 'index'])->name('home');
Route::get('{city}', [CityController::class, 'detail'])->name('detail');
