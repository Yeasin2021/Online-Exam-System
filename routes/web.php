<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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





Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'studentRegister'])->name('student-register');


Route::get('/',[AuthController::class,'loginPage']);
Route::get('/login',function(){
    return redirect('/');
});

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::post('/login',[AuthController::class,'login'])->name('login');






Route::group(['middleware' => ['web','checkAdmin']],function(){
    Route::get('/admin/dashboard',[AuthController::class,'adminDashboard']);
    // Subjects Route
    Route::get('/admin/subject',[AdminController::class,'addSubjectView'])->name('admin-subject');
    Route::post('/admin/add-subject',[AdminController::class,'addSubject'])->name('add-subject');
    Route::post('/admin/update-subject',[AdminController::class,'updateSubject'])->name('update-subject');
    Route::post('/admin/delete-subject',[AdminController::class,'deleteSubject'])->name('remove-subject');
    // EXAM Route
    Route::get('/admin/exam',[AdminController::class,'examDashBoard'])->name('admin-exam');
    Route::post('/admin/exam',[AdminController::class,'addExam'])->name('admin-exam-post');
    Route::post('/admin/exam-update',[AdminController::class,'updateExam'])->name('admin-update-exam');
    Route::post('/admin/delete-exam',[AdminController::class,'deleteExam'])->name('remove-exam');

});





Route::group(['middleware' => ['web','checkStudent']],function(){
    Route::get('/student/dashboard',[AuthController::class,'studentDashboard']);
});







