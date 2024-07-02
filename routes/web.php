<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/about', [AuthController::class, 'aboutSection'])->name('about');
Route::get('/service', [AuthController::class, 'serviceSection'])->name('services');
Route::get('/book', [AuthController::class, 'bookSection'])->name('book');
Route::post('/book', [BookingController::class, 'store'])->name('book.store')->middleware('auth');
Route::put('/admin/update-helper/{order}', [AuthController::class, 'updateHelper'])->name('admin.updateHelper');
Route::put('/admin/update-status/{order}', [AuthController::class, 'updateStatus'])->name('admin.updateStatus');
Route::get('/history', [BookingController::class, 'history'])->name('history');
Route::delete('/order/{id}', [BookingController::class, 'deleteOrder'])->name('order.delete');
Route::post('/admin/download-pdf/{order}', [AuthController::class, 'downloadPdf'])->name('admin.downloadPdf');
