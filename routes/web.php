<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class , 'home']);
Route::get('/admin', function () {
return view('admin');
});
Route::get('/contact' ,function () {
    return view('welcome');
} );   