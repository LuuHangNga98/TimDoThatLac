<?php

use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\NguoiDungController;
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
Route::prefix('/nguoi-dung')->group(function(){
    
    //Route::get('/', [NguoiDungController::class,'index'])->name('trang-chu');
    
    Route::get('/dang-nhap', [NguoiDungController::class,'sign_in'])->name('dang-nhap')->middleware('guest');
    Route::post('/dang-nhap', [NguoiDungController::class,'get_sign_in'])->name('xl-dang-nhap')->middleware('guest');

    Route::get('/dang-ky', [NguoiDungController::class,'sign_up'])->name('dang-ky')->middleware('guest');
    Route::post('/dang-ky', [NguoiDungController::class,'get_sign_up'])->name('xl-dang-ky')->middleware('guest');

    Route::get('/dang-xuat', [NguoiDungController::class, 'log_out'])->name('dang-xuat')->middleware('auth');
    Route::get('/quen-mat-khau', [NguoiDungController::class,'forgot_password'])->name('quen-mat-khau');

    Route::get('/trang-ca-nhan', [NguoiDungController::class,'edit_account'])->name('trang-ca-nhan');
    Route::post('/trang-ca-nhan', [NguoiDungController::class,'get_edit_account'])->name('xl-trang-ca-nhan');

    Route::get('/', [BaiDangController::class,'index'])->name('trang-chu');
    
    Route::get('/chi-tiet-bai-viet', [BaiDangController:: class,'detail'])->name('chi-tiet-bai-viet');
   
    Route::get('/dang-bai', [BaiDangController:: class,'dang_bai'])->name('dang-bai')->middleware('auth');
    Route::post('/dang-bai', [BaiDangController:: class,'xl_dang_bai'])->name('xl-dang-bai')->middleware('auth');
    Route::get('/danh-sach-bai-dang/{id}',[BaiDangController::class,'ds_bai_dang'])->name('ds-bai-dang');
    Route::get('/xem-bai-dang/{id}',[BaiDangController::class,'xem_bai_dang'])->name('xem-bai-dang');
    Route::post('/bao-cao',[BaiDangController::class,'bao_cao'])->name('bao-cao')->middleware('auth');
    
});
Route::prefix('/admin')->group(function(){});


