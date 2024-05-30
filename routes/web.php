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
use App\Http\Controllers\Password;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Register;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\supircontroller;
use App\Http\Controllers\supirdashboard;
use App\Http\Controllers\SupirProfile;
use App\Http\Controllers\SupirTransaksi;
use App\Http\Controllers\suratjalancontroller;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\UsersController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/gudang', [AdminController::class, 'gudang'])->middleware('userAkses:gudang');
    Route::get('/admin/supir', [AdminController::class, 'supir']);
    Route::get('/logout', [SesiController::class, 'logout']);
});

// Route::resource('/changepassword', Password::class);

Route::get('/changepassword', [Password::class, 'index'])->name('password.change');
Route::post('/password/update', [Password::class, 'changePassword'])->name('password.update');

Route::get('/register', [Register::class, 'index']);
Route::post('/register', [Register::class, 'register'])->name('register');


//Dashboard Admin
Route::resource('/admindashboard', AdminDashboardController::class);

//Profile Admin
Route::resource('/adminprofile', AdminProfileController::class);

//Transaksi Admin
// Route::post('/admin/admintransaksi', [transaksiController::class, 'store']);
Route::resource('/admintransaksi', transaksiController::class);
Route::get('/form-transaksi', [transaksiController::class, 'create']);
Route::get('/customer/{id}/pickup', [TransaksiController::class, 'getPickupAddress']);
Route::get('/supir/{id}/plat', [TransaksiController::class, 'getPlat']);
Route::post('transaksi/{id}/complete', [TransaksiController::class, 'complete']);
Route::post('transaksi/hide/{id}', [TransaksiController::class, 'hide'])->name('transaksi.hide');
Route::post('transaksi/unhide/{id}', [TransaksiController::class, 'unhide'])->name('transaksi.unhide');


//Report Admin
Route::resource('/adminreport', AdminReportController::class);
Route::get('/admindetailreport/{date}', [AdminReportController::class, 'showDetail'])->name('admindetailreport.detail');

//Surat Jalan Admin
Route::get('/suratjalan', [suratjalancontroller::class, 'index']);
// Route::get('suratjalan/view/pdf/{id}', [suratjalancontroller::class

Route::get('/suratjalan/view/pdf/{id}', [suratjalancontroller::class, 'view_pdf']);
// Route::get('/suratjalan/pdf/{id}', [SuratJalanController::class, 'createPDF'])->name('transaksi.showPDF');
Route::get('/viewsuratjalan/{id}', [suratjalancontroller::class, 'indeks'])->name('viewsuratjalan');
// Route::post('/viewsuratjalan/{id}', [SuratJalanController::class, 'simpan'])->name('simpan-suratjalan');
Route::post('/savesuratjalan', [SuratJalanController::class, 'save'])->name('savesuratjalan');
Route::post('/simpan-suratjalan', [SuratJalanController::class, 'simpan'])->name('simpan-suratjalan');

Route::resource('/admincustomer', CustomerController::class);
Route::get('/form-customer', [CustomerController::class, 'create']);

Route::resource('/adminuser', UsersController::class);
// Route::get('adminuser/{id}/edit', [UsersController::class, 'edit']);
// Route::post('/form-customer/{id}', [CustomerController::class, 'update']);

//Dashboard Gudang
Route::resource('/gudangdashboard', GudangDashboardController::class);

//Profile Gudang
Route::resource('/gudangprofile', GudangProfileController::class);

//Barang Gudang
Route::resource('/gudangbarang', GudangBarangController::class);

//Supir Gudang
Route::resource('/gudangsupir', supircontroller::class);
Route::get('/tambahsupir', [supircontroller::class, 'create']);

//Tracking Gudang
Route::resource('/gudangtracking', GudangTrackingController::class);
Route::post('tracking/{id}/complete', [GudangTrackingController::class, 'complete']);
// Route::get('/hasiltracking', GudangTrackingController::class, 'index');

//Supir dashboard
Route::resource('/supirdashboard', supirdashboard::class);

//Supir Profile
Route::resource('/supirprofile', SupirProfile::class);

//Supir Transaksi
Route::resource('/supirtransaksi', SupirTransaksi::class);
Route::post('/supirtransaksi/upload', [SupirTransaksi::class, 'upload']);


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
Route::get('/admintransaksi', [transaksiController::class, 'index'])->name('admintransaksi');
Route::resource('transaksi', transaksiController::class);
