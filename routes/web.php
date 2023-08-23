<?php

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

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);

Route::post('/tasks/store', [TaskController::class, 'store']);
Route::put('/tasks/update/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy']);