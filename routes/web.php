<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FormController::class, 'index']);
Route::get('/read',[FormController::class,'read']);
Route::get('/create',[FormController::class,'create']);
Route::get('/store',[FormController::class,'store']);
Route::get('/show/{id}',[FormController::class,'show']);
Route::get('/update/{id}',[FormController::class,'update']);
Route::get('/destroy/{id}',[FormController::class,'destroy']);
