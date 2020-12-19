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
    
	/*MASTER INVOICE*/
    Route::get('invoice', [App\Http\Controllers\Backend\InvoiceController::class, 'index'])->name('invoice');
    Route::get('invoice/tambah', [App\Http\Controllers\Backend\InvoiceController::class, 'tambah'])->name('invoice.tambah');
    Route::post('invoice/add', [App\Http\Controllers\Backend\InvoiceController::class, 'add'])->name('invoice.add');
    Route::get('invoice/edit/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('invoice/update', [App\Http\Controllers\Backend\InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('invoice/hapus/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'hapus'])->name('invoice.hapus');
    Route::get('invoice/detailschedule/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'detailschedule'])->name('invoice.detailschedule');
    Route::get('invoice/batal/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'batal'])->name('invoice.batal');
    Route::post('invoice/batalkan', [App\Http\Controllers\Backend\InvoiceController::class, 'batalkan'])->name('invoice.batalkan');
    Route::get('invoice/kwitansi/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'kwitansi'])->name('invoice.kwitansi');
    Route::post('invoice/buatkwitansi', [App\Http\Controllers\Backend\InvoiceController::class, 'buatkwitansi'])->name('invoice.buatkwitansi');
    
    /*LAPORAN*/
    Route::get('laporan', [App\Http\Controllers\Backend\LaporanController::class, 'index'])->name('laporan');
    Route::get('laporan/cetakinvoice/{id}', [App\Http\Controllers\Backend\LaporanController::class, 'cetakinvoice'])->name('laporan.cetakinvoice');
    Route::get('laporan/cetakkwitansi/{id}', [App\Http\Controllers\Backend\LaporanController::class, 'cetakkwitansi'])->name('laporan.cetakkwitansi');
    

});
    
