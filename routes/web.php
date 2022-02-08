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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register_user', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/user', [App\Http\Controllers\HomeController::class, 'usercreate'])->name('user');

Route::get('/lists', [App\Http\Controllers\HomeController::class, 'lists'])->name('lists');

Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('res.edit');

Route::get('/reservation', [App\Http\Controllers\ReservationController::class, 'reservation'])->name('reservation');
