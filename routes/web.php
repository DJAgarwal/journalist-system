<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Auth::routes();

Route::get('/', [NewsController::class, 'index']);
Route::prefix('news')->group(function () {
    Route::get('/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/store', [NewsController::class, 'store'])->name('news.store');
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});
