<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PrintController;

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

Route::middleware(['IsGuest'])->group(function () {
    Route::get('/',[UserController::class,'showLogin'])->name('login');
    Route::post('/login',[UserController::class,'LoginAuth'])->name('login.auth');
    Route::get('/register',[UserController::class,'ShowRegister'])->name('register');
    Route::post('/register/store',[UserController::class,'RegisterStore'])->name('register.store');
});


Route::middleware(['IsLogin'])->group(function () {


    Route::get ('/landing',[LandingController::class,'index'])->name('landing.page');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/contact',[LandingController::class,'showcontact'])->name('contact');
    Route::get('/about',[LandingController::class,'showinfo'])->name('info');


Route::middleware(['IsKepsek'])->group(function () {
    Route::prefix('/print')->name('print.')->group(function () {
        Route::get('/data/user',[PrintController::class,'UserIndex'])->name('kepsek.user.index');
        Route::get('/data/siswa',[PrintController::class,'SiswaIndex'])->name('kepsek.siswa.index');
        Route::get('/download/pdf',[PrintController::class,'DownloadUserPDF'])->name('user.index');
        Route::get('/download/pdf/siswa',[PrintController::class,'DownloadSiswaPDF'])->name('siswa.index');
        Route::get('/download/excel/user',[UserController::class,'ExportExcel'])->name('user.excel');
        Route::get('/download/excel/siswa',[SiswaController::class,'ExportExcel'])->name('siswa.excel');
    });
});


Route::middleware(['IsAdmin'])->group(function (){
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/data',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::get('/{id}/edit',[UserController::class,'edit'])->name('edit');
        Route::patch('/{id}/update',[UserController::class,'update'])->name('update');
        Route::delete('/{id}/destroy',[UserController::class,'destroy'])->name('destroy');
    });
});

Route::middleware(['IsGuru'])->group(function () {

    Route::prefix('/siswa')->name('siswa.')->group(function () {
        Route::get('/data',[SiswaController::class,'index'])->name('index');
        Route::get('/create',[SiswaController::class,'create'])->name('create');
        Route::post('/store',[SiswaController::class,'store'])->name('store');
        Route::get('/{id}/edit',[SiswaController::class,'edit'])->name('edit');
        Route::patch('/{id}/update',[SiswaController::class,'update'])->name('update');
        Route::delete('/{id}/destroy',[SiswaController::class,'destroy'])->name('destroy');
    });
});
});


