<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;


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

Route::get('/list', [ListController::class, 'index'])->name('list.index');

Route::get('/list/create', [ListController::class, 'create'])->name('list.create');

Route::post('/list/create/new', [ListController::class, 'store'])->name('list.store');

Route::get('/list/edit/{id}', [ListController::class, 'edit'])->name('list.edit');

Route::get('/list/delete/{id}', [ListController::class, 'destroy'])->name('list.destroy');

Route::post('/list/edit/{id}/new', [ListController::class, 'update'])->name('list.update');
