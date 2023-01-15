<?php

use App\Http\Controllers\BinaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/sign',[UserController::class,'show']);
Route::post('/sign',[UserController::class,'store']);

Route::get('/login',[UserController::class,'login_show']);
Route::post('/login',[UserController::class,'login']);

Route::get('/logout',function(){
    Auth::logout();
});
Route::get('/view',[UserController::class,'view']);

Route::get('/tree',function(){
    return view('def');
});

Route::get('/view_rt',[UserController::class,'view_rt']);

Route::get('/register',[BinaryController::class,'view']);
Route::post('/register',[BinaryController::class,'store']);







