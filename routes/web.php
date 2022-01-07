<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProgrammingLanguagesController;

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

Route::middleware(['auth', 'second'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Route::get('export/users', [UserController::class, 'export'])->name('users.export');
    //Route::get('export/teachers', [TeacherController::class, 'export'])->name('teachers.export');
    //Route::get('export/programminglanguages', [ProgrammingLanguagesController::class, 'export'])->name('programminglanguages.export');
    //Route::get('export/students', [StudentsController::class, 'export'])->name('students.export');
    
    Route::resource('user', UserController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('programminglanguages', ProgrammingLanguagesController::class);
    Route::resource('students', StudentsController::class);
});

