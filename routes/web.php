<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth'])->name('category');
Route::post('/categories', [CategoryController::class, 'store'])->middleware(['auth'])->name('save');
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware(['auth'])->name('create');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->middleware(['auth'])->name('update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth'])->name('delete');

Route::get('/tasks', [TaskController::class, 'index'])->middleware(['auth'])->name('task');

require __DIR__.'/auth.php';
