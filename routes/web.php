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

// controller admin route
use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\LoginCtrl;



Route::get('/', [AdminCtrl::class,'index']);

// Login
Route::get('/login', [LoginCtrl::class,'index']);
Route::post('/login/cek', [LoginCtrl::class,'cek_login']);

Route::get('/logout', [LoginCtrl::class,'logout']);





// surat masuk
Route::get('/dashboard/surat-masuk/data', [AdminCtrl::class,'surat_masuk']);
Route::get('/dashboard/surat-masuk/add', [AdminCtrl::class,'surat_masuk_add']);
Route::post('/dashboard/surat-masuk/act', [AdminCtrl::class,'surat_masuk_act']);
Route::get('/dashboard/surat-masuk/edit/{id}', [AdminCtrl::class,'surat_masuk_edit']);
Route::post('/dashboard/surat-masuk/update', [AdminCtrl::class,'surat_masuk_update']);
Route::get('/dashboard/surat-masuk/delete/{id}', [AdminCtrl::class,'surat_masuk_delete']);


// surat keluar
Route::get('/dashboard/surat-keluar/data', [AdminCtrl::class,'surat_keluar']);
Route::get('/dashboard/surat-keluar/add', [AdminCtrl::class,'surat_keluar_add']);
Route::post('/dashboard/surat-keluar/act', [AdminCtrl::class,'surat_keluar_act']);
Route::get('/dashboard/surat-keluar/edit/{id}', [AdminCtrl::class,'surat_keluar_edit']);
Route::post('/dashboard/surat-keluar/update', [AdminCtrl::class,'surat_keluar_update']);
Route::get('/dashboard/surat-keluar/delete/{id}', [AdminCtrl::class,'surat_keluar_delete']);

// cetak surat
Route::post('/dashboard/cetak/surat-masuk', [AdminCtrl::class,'cetak_suratMasuk']);

Route::post('/dashboard/cetak/surat-keluar', [AdminCtrl::class,'cetak_suratKeluar']);


Route::get('/dashboard/pengaturan', [AdminCtrl::class,'pengaturan']);

Route::post('/dashboard/pengaturan/update', [AdminCtrl::class,'pengaturan_update']);



