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
// Route::redirect('/home', '/home/{{auth()->user()->id}}');

Auth::routes();

Route::get('/p/{task}/edit', [App\Http\Controllers\TasksController::class, 'edit'])->name('task.edit');
Route::get('/p/create', [App\Http\Controllers\TasksController::class, 'create'])->name('task.create');
Route::post('/p', [App\Http\Controllers\TasksController::class, 'store'])->name('task.store');
Route::put('/p/{task}', [App\Http\Controllers\TasksController::class, 'update'])->name('task.update');

Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'index'])->name('home.show');
