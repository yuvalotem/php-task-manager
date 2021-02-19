<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Auth::routes();

Route::get('/p/{task}/edit', [App\Http\Controllers\TasksController::class, 'edit'])->name('task.edit');
Route::get('/p/create', [App\Http\Controllers\TasksController::class, 'create']);
Route::post('/p', [App\Http\Controllers\TasksController::class, 'store']);
Route::put('/p/{task}', [App\Http\Controllers\TasksController::class, 'update']);

Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'index'])->name('home.show');
