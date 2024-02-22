<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class , 'home'])->name('home');
Route::get('/admin', function () {
return view('admin');
});
Route::post('/store',[TodoController::class , 'store'])-> name('store');
Route::get('/contact' ,function () {
    return view('welcome');
} );   