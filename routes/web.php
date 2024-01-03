<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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

// Route::get('/clients', 'ClientsController@show');


Route::get('/', [ClientController::class, 'index']);
Route::get('/edit/{id}', [ClientController::class, 'edit']);
Route::get('/show/{id}', [ClientController::class, 'show']);
Route::get('/create', [ClientController::class, 'create']);
Route::post('/store', [ClientController::class, 'store']);
Route::post('/update/{id}', [ClientController::class, 'update']);
Route::delete('/destroy/{id}', [ClientController::class, 'destroy']);
