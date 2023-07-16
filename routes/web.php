<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('blog', BlogController::class);
Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard');
    Route::get('/create', 'register')->name('user.create');
    Route::post('/', 'store')->name('user.store');
    Route::get('/{id}', 'show')->name('user.show');
    Route::delete('/{id}', 'delete')->name('user.destroy');
    Route::get('/{id}/edit', 'edit')->name('user.edit');
    Route::put('/{id}', 'update')->name('user.update');
});
