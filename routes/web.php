<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminTrackingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GudangBarangController;
use App\Http\Controllers\GudangDashboardController;
use App\Http\Controllers\GudangProfileController;
use App\Http\Controllers\GudangTrackingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\suratjalancontroller;
use App\Http\Controllers\transaksiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//hanya guest yang bisa akses controller ini atau tidak dalam kondisi login
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/gudang', [AdminController::class, 'gudang'])->middleware('userAkses:gudang');
    Route::get('/logout', [SesiController::class, 'logout']);
});

//Dashboard Admin
Route::resource('/admindashboard', AdminDashboardController::class);

//Profile Admin
Route::resource('/adminprofile', AdminProfileController::class);

//Transaksi Admin
// Route::post('/admin/admintransaksi', [transaksiController::class, 'store']);
Route::resource('/admintransaksi', transaksiController::class);
Route::get('/form-transaksi', [transaksiController::class, 'create']);
Route::get('/customer/{id}/pickup', [TransaksiController::class, 'getPickupAddress']);
Route::post('transaksi/{id}/complete', [TransaksiController::class, 'complete']);

//Report Admin
Route::resource('/adminreport', AdminReportController::class);
Route::get('/admindetailreport/{date}', [AdminReportController::class, 'showDetail'])->name('admindetailreport.detail');

//Surat Jalan Admin
Route::get('/suratjalan', [suratjalancontroller::class, 'index']);
// Route::get('suratjalan/view/pdf/{id}', [suratjalancontroller::class, 'view_pdf']);
// Route::get('suratjalan/download/pdf/{id}', [suratjalancontroller::class, 'download_pdf']);
Route::get('/suratjalan/view/pdf/{id}', [suratjalancontroller::class, 'view_pdf']);


//Customer Admin
Route::resource('/admincustomer', CustomerController::class);
Route::get('/form-customer', [CustomerController::class, 'create']);

//Dashboard Gudang
Route::resource('/gudangdashboard', GudangDashboardController::class);

//Profile Gudang
Route::resource('/gudangprofile', GudangProfileController::class);

//Barang Gudang
Route::resource('/gudangbarang', GudangBarangController::class);

//Tracking Gudang
Route::resource('/gudangtracking', GudangTrackingController::class);
Route::post('tracking/{id}/complete', [GudangTrackingController::class, 'complete']);
// Route::get('/hasiltracking', GudangTrackingController::class, 'index');

Route::get('/admin/admindashboard', function () {
    return view('admin.admindashboard');
});
Route::get('/admin/adminprofile', function () {
    return view('admin.adminprofile');
});
// Route::get('/admin/admintransaksi', function () {
//     return view('admin.admintransaksi');
// });
Route::get('/admin/admintracking', function () {
    return view('admin.admintracking');
});
Route::get('/admin/admincustomer', function () {
    return view('admin.admincustomer');
});

Route::get('/admin/gudangdashboard', function () {
    return view('gudang.gudangdashboard');
});
Route::get('/admin/gudangprofile', function () {
    return view('gudang.gudangprofile');
});
Route::get('/admin/gudangbarang', function () {
    return view('gudang.gudangbarang');
});
Route::get('/admin/gudangtracking', function () {
    return view('gudang.gudangtracking');
});

Route::resource('transaksi', transaksiController::class);
