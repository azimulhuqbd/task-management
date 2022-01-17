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

Route::group([
    'middleware' => 'auth',
    'prefix' => '/categories',
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::post('/', [CategoryController::class, 'store'])->name('save_category');
    Route::get('/create', [CategoryController::class, 'create'])->name('create_category');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
});

//Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('category');
//Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth')->name('save_category');
//Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth')->name('create_category');
//Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware('auth')->name('edit_category');
//Route::put('/categories/{id}', [CategoryController::class, 'update'])->middleware('auth')->name('update_category');
//Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('auth')->name('delete_category');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('task');
    Route::post('/tasks', [TaskController::class, 'store'])->name('save_task');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('create_task');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('edit_task');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('update_task');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('delete_task');
});


require __DIR__.'/auth.php';
