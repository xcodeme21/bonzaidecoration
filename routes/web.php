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


Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-aplikasi', [App\Http\Controllers\Auth\LoginController::class, 'login_form'])->name('login_form');
Route::post('/reloadcaptcha', [App\Http\Controllers\Auth\LoginController::class, 'reloadcaptcha'])->name('reloadcaptcha');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'backend', 'middleware'=>'auth'], function(){
    Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    
	/*MASTER PROFIL*/
    Route::get('profil', [App\Http\Controllers\Backend\ProfilController::class, 'index'])->name('profil');
    Route::post('profil/update', [App\Http\Controllers\Backend\ProfilController::class, 'update'])->name('profil.update');
    
	/*MASTER CLIENT*/
    Route::get('client', [App\Http\Controllers\Backend\ClientController::class, 'index'])->name('client');
    Route::get('client/tambah', [App\Http\Controllers\Backend\ClientController::class, 'tambah'])->name('client.tambah');
    Route::post('client/add', [App\Http\Controllers\Backend\ClientController::class, 'add'])->name('client.add');
    Route::get('client/edit/{id}', [App\Http\Controllers\Backend\ClientController::class, 'edit'])->name('client.edit');
    Route::post('client/update', [App\Http\Controllers\Backend\ClientController::class, 'update'])->name('client.update');
    Route::get('client/hapus/{id}', [App\Http\Controllers\Backend\ClientController::class, 'hapus'])->name('client.hapus');
    
	/*MASTER PACKAGE DECORATION*/
    Route::get('package-decoration', [App\Http\Controllers\Backend\PackageDecorationController::class, 'index'])->name('package-decoration');
    Route::get('package-decoration/tambah', [App\Http\Controllers\Backend\PackageDecorationController::class, 'tambah'])->name('package-decoration.tambah');
    Route::post('package-decoration/add', [App\Http\Controllers\Backend\PackageDecorationController::class, 'add'])->name('package-decoration.add');
    Route::get('package-decoration/edit/{id}', [App\Http\Controllers\Backend\PackageDecorationController::class, 'edit'])->name('package-decoration.edit');
    Route::post('package-decoration/update', [App\Http\Controllers\Backend\PackageDecorationController::class, 'update'])->name('package-decoration.update');
    Route::get('package-decoration/hapus/{id}', [App\Http\Controllers\Backend\PackageDecorationController::class, 'hapus'])->name('package-decoration.hapus');
    
	/*MASTER SCHEDULE*/
    Route::get('schedule', [App\Http\Controllers\Backend\ScheduleController::class, 'index'])->name('schedule');
    Route::get('schedule/tambah', [App\Http\Controllers\Backend\ScheduleController::class, 'tambah'])->name('schedule.tambah');
    Route::post('schedule/add', [App\Http\Controllers\Backend\ScheduleController::class, 'add'])->name('schedule.add');
    Route::get('schedule/edit/{id}', [App\Http\Controllers\Backend\ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::post('schedule/update', [App\Http\Controllers\Backend\ScheduleController::class, 'update'])->name('schedule.update');
    Route::get('schedule/hapus/{id}', [App\Http\Controllers\Backend\ScheduleController::class, 'hapus'])->name('schedule.hapus');
    Route::get('schedule/detailclient/{id}', [App\Http\Controllers\Backend\ScheduleController::class, 'detailclient'])->name('schedule.detailclient');
    

});
    
