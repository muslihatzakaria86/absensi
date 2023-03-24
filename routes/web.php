<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\http\Middleware\Role;

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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postregister', [AuthController::class, 'postregister']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);

Route::get('/', [AbsenController::class, 'index'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/profile/{name}/edit', [AuthController::class, 'edit'])->middleware('auth');
Route::put('/profile/{name}', [AuthController::class, 'update'])->middleware('auth');
Route::post('/absensi', [AbsenController::class, 'absensi'])->middleware('auth');
Route::get('/laporan', [AbsenController::class, 'laporan'])->middleware('auth');
Route::get('/datakaryawan', [AbsenController::class, 'data'])->middleware('admin');
Route::delete('/hapus/{id}', [AbsenController::class, 'destroy'])->middleware('admin');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/downloadpdf', [AdminController::class, 'downloadpdf']);
    Route::get('/admin', [AdminController::class, 'user']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/pembimbing', [AdminController::class, 'pembimbing']);
    Route::get('/admin/add-pbb', [AdminController::class, 'addpbb']);
    Route::post('/postpbb', [AdminController::class, 'postpbb']);
    Route::get('/admin/{id}/edit', [AdminController::class, 'editpbb']);
    Route::post('/admin/{id}/update', [AdminController::class, 'update']);
    Route::get('/admin/{id}/delete', [AdminController::class, 'destroy']);
});

Route::get('/logout', [AuthController::class, 'logout']);
