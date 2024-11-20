<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::post('/store/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');


/**
 * Article creation
 */
Route::post('/student/{student}/articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('/edit/student/articles/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/edit/student/articles/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/student/articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');

/**
 * File uploader
 */
Route::post('/student/{student}/upload', [FileController::class, 'upload'])->name('file.upload');
Route::get('/file/download/{file}', [FileController::class, 'download'])->name('file.download');
Route::get('/student/file/{file}/edit', [FileController::class, 'edit'])->name('file.edit');
Route::post('/student/file/{file}', [FileController::class, 'update'])->name('file.update');
Route::delete('/student/file/{file}', [FileController::class, 'destroy'])->name('file.destroy');



/**
 * USER CREATE
 */

 Route::get('/users', [UserController::class, 'index'])->name('user.index');
 Route::get('/registration', [UserController::class, 'create'])->name('user.create');
 Route::post('/registration', [UserController::class, 'store'])->name('user.store');
 Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');

/**
 * Authentification
 */
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');





