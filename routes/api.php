<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/create_res', [App\Http\Controllers\ReservationController::class, 'create']);
//create

Route::post('/update_res/{id}', [App\Http\Controllers\ReservationController::class, 'update']);
//update

Route::get('/view/{id}', [App\Http\Controllers\ReservationController::class, 'view_by_id']);
//view

Route::post('/delete/{id}', [App\Http\Controllers\ReservationController::class, 'delete']);
//delete

Route::get('/lists', [App\Http\Controllers\ReservationController::class, 'lists']);
//lists