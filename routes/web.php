<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ItemController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return auth()->check() ? redirect(route('task.index')) : view('welcome'); 
});

Route::middleware('auth')->group(function () {

    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/tasks/create', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/tasks/edit/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

    Route::get('/tasks/item/create/{id}', [ItemController::class, 'create'])->name('item.create');
    Route::post('/tasks/item/create/{id}', [ItemController::class, 'store'])->name('item.store');
    Route::get('/tasks/item/edit/{item}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/tasks/item/edit/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/tasks/item/delete/{item}', [ItemController::class, 'destroy'])->name('item.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('auth.loginView');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/register', [RegisterController::class, 'registerView'])->name('auth.registerView');
Route::post('/register/verification', [RegisterController::class, 'register'])->name('auth.register');
Route::post('/register/verification/{user}/{code}', [RegisterController::class, 'confirm'])->name('auth.confirm');
