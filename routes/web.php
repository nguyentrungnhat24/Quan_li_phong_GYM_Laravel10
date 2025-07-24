<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\PTController;
use App\Http\Controllers\GoiTapController;
use App\Http\Controllers\LichTapController;
use App\Http\Controllers\DungCuController;
use App\Http\Controllers\DanhMucDungCuController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('admin/app', function () {
    return view('admin.layouts.app');
});

    
// Login routes
Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('check_signin');



// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/trangchu', [AdminController::class, 'index'])->name('trangchu');

    

    // NhanVien routes
    Route::get('/nhanvien', [NhanVienController::class, 'nhanVienList'])->name('nhanvien');
    Route::post('/nhanvien/add', [NhanVienController::class, 'addNhanVien'])->name('nhanvien.add');
    Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'editNhanVien'])->name('nhanvien.edit');
    Route::post('/nhanvien/update/{id}', [NhanVienController::class, 'updateNhanVien'])->name('nhanvien.update');
    Route::get('/nhanvien/delete/{id}', [NhanVienController::class, 'deleteNhanVien'])->name('nhanvien.delete');

    // KhachHang routes
    Route::get('/khachhang', [KhachHangController::class, 'khachHangList'])->name('khachhang');
    Route::post('/khachhang/add', [KhachHangController::class, 'addKhachHang'])->name('khachhang.add');
    Route::get('/khachhang/edit/{id}', [KhachHangController::class, 'editKhachHang'])->name('khachhang.edit');
    Route::post('/khachhang/update/{id}', [KhachHangController::class, 'updateKhachHang'])->name('khachhang.update');
    Route::get('/khachhang/delete/{id}', [KhachHangController::class, 'deleteKhachHang'])->name('khachhang.delete');

    // PT routes
    Route::get('/pt', [PTController::class, 'ptList'])->name('pt');
    Route::post('/pt/add', [PTController::class, 'addPT'])->name('pt.add');
    Route::get('/pt/edit/{id}', [PTController::class, 'editPT'])->name('pt.edit');
    Route::post('/pt/update/{id}', [PTController::class, 'updatePT'])->name('pt.update');
    Route::get('/pt/delete/{id}', [PTController::class, 'deletePT'])->name('pt.delete');

    // GoiTap routes
    Route::get('/goitap', [GoiTapController::class, 'goiTapList'])->name('goitap');
    Route::post('/goitap/add', [GoiTapController::class, 'addGoiTap'])->name('goitap.add');
    Route::get('/goitap/edit/{id}', [GoiTapController::class, 'editGoiTap'])->name('goitap.edit');
    Route::post('/goitap/update/{id}', [GoiTapController::class, 'updateGoiTap'])->name('goitap.update');
    Route::get('/goitap/delete/{id}', [GoiTapController::class, 'deleteGoiTap'])->name('goitap.delete');

    // LichTap routes
    Route::get('/lichtap', [LichTapController::class, 'lichTapList'])->name('lichtap');
    Route::post('/lichtap/add', [LichTapController::class, 'addLichTap'])->name('lichtap.add');
    Route::get('/lichtap/edit/{id}', [LichTapController::class, 'editLichTap'])->name('lichtap.edit');
    Route::post('/lichtap/update/{id}', [LichTapController::class, 'updateLichTap'])->name('lichtap.update');
    Route::get('/lichtap/delete/{id}', [LichTapController::class, 'deleteLichTap'])->name('lichtap.delete');

    // DungCu routes
    Route::get('/dungcu', [DungCuController::class, 'dungCuList'])->name('dungcu');
    Route::post('/dungcu/add', [DungCuController::class, 'addDungCu'])->name('dungcu.add');
    Route::get('/dungcu/edit/{id}', [DungCuController::class, 'editDungCu'])->name('dungcu.edit');
    Route::post('/dungcu/update/{id}', [DungCuController::class, 'updateDungCu'])->name('dungcu.update');
    Route::get('/dungcu/delete/{id}', [DungCuController::class, 'deleteDungCu'])->name('dungcu.delete');

    // DanhMucDungCu routes
    Route::get('/danhmucdungcu', [DanhMucDungCuController::class, 'danhMucDungCuList'])->name('danhmucdungcu');
    Route::post('/danhmucdungcu/add', [DanhMucDungCuController::class, 'addDanhMucDungCu'])->name('danhmucdungcu.add');
    Route::get('/danhmucdungcu/edit/{id}', [DanhMucDungCuController::class, 'editDanhMucDungCu'])->name('danhmucdungcu.edit');
    Route::post('/danhmucdungcu/update/{id}', [DanhMucDungCuController::class, 'updateDanhMucDungCu'])->name('danhmucdungcu.update');
    Route::get('/danhmucdungcu/delete/{id}', [DanhMucDungCuController::class, 'deleteDanhMucDungCu'])->name('danhmucdungcu.delete');

    Route::get('/thongke', function () { return view('admin.thongke'); })->name('thongke');
    Route::get('/bmi', function () { return view('admin.bmi'); })->name('bmi');
});

Route::get('/test', function () {
    return 'Test OK';
});
