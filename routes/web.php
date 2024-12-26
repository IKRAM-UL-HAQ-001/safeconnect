<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RideActivityController;

Route::get('/', [AuthController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'loginAdminAuth'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/forgetPassword', [AuthController::class, 'forgetPassword'])->name('auth.forget');
Route::post('/auth/updatePassword', [AuthController::class, 'update'])->name('admin.auth.post');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/user/list', [UserController::class, 'userList'])->name('admin.user.list');
Route::post('/admin/user/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/admin/user/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/admin/ride/list', [RideActivityController::class, 'rideList'])->name('admin.ride_activity.list');
Route::post('/admin/ride/edit', [RideActivityController::class, 'edit'])->name('ride.edit');
Route::post('/admin/ride/delete', [RideActivityController::class, 'destroy'])->name('ride.destroy');

