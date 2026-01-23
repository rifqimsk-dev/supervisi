<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\TemuanController;
use App\Http\Controllers\UserController;
use App\Mail\OtpMail;

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

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])
->middleware(['auth', 'otp_verified', 'role:admin,kadep,user']);

// MASTER DEPARTEMEN
Route::resource('/departemen', DepartemenController::class)
->middleware(['auth', 'otp_verified', 'role:admin']);

// MASTER DEALER
Route::resource('/dealer', DealerController::class)
->middleware(['auth', 'otp_verified', 'role:admin']);

// MASTER INVENTARIS
Route::resource('/inventaris', InventarisController::class)
->middleware(['auth', 'otp_verified', 'role:admin']);

// KUNJUNGAN
Route::resource('/kunjungan', KunjunganController::class)
->middleware(['auth', 'otp_verified', 'role:kadep,user']);
Route::patch('/kunjungan/{id}/approve', [KunjunganController::class, 'approve'])
->name('kunjungan.approve')
->middleware(['auth', 'otp_verified', 'role:kadep,user']);
Route::get('/kunjungan/{id}/download', [KunjunganController::class, 'download'])
->name('kunjungan.download')
->middleware(['auth', 'otp_verified', 'role:kadep,user']);

// TEMUAN
Route::post('/temuan', [TemuanController::class, 'store'])
->name('temuan.store')
->middleware(['auth', 'otp_verified', 'role:user']);

// MANAJEMEN USER
Route::resource('/user', UserController::class)
->middleware(['auth', 'otp_verified', 'role:admin']);

// AUTHENTICATION
// ====================================================================
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login/verify', [AuthController::class, 'verify'])->name('login.verify');
Route::post('/verify', [AuthController::class, 'verifyProcess'])->name('verify.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ====================================================================

// DOCUMENTATION VIEWS
Route::get('/docs/login', function() {
    return view('docs.login');
});
Route::get('/docs/dashboard', function() {
    return view('docs.dashboard');
});
Route::get('/docs/form', function() {
    return view('docs.form');
});
Route::get('/docs/form-step', function() {
    return view('docs.form-step');
});
Route::get('/docs/table', function() {
    return view('docs.table', ['title' => 'Data Table']);
});