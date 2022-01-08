<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProgLanguagesController;
use App\Http\Controllers\FilesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


    Route::get('/home', [App\Http\Controllers\ProgLanguagesController::class, 'index'])->name('home');
    
    Route::resource('user', UserController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/programming-languages', ProgLanguagesController::class);
    Route::resource('/students', StudentsController::class);
    Route::resource('/file', FilesController::class);



