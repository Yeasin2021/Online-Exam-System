<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::get('/',[AuthController::class,'loginPage']);
Route::get('/login',function(){
    return redirect('/');
});

Route::post('/login',[AuthController::class,'login'])->name('login');


Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'studentRegister'])->name('student-register');




Route::get('/student/dashboard',[AuthController::class,'studentDashboard']);
Route::get('/admin/dashboard',[AuthController::class,'adminDashboard']);



