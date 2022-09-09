<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
