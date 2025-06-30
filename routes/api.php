<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\API\EmailVerificationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;


// ✅ Authentication Routes


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
    // ✅ Protected Routes (Only for authenticated users)
    Route::middleware('auth:sanctum')->group(function () {
        
         Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
   
});
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('sendOtp');;
Route::post('/verify-otp-reset-password', [AuthController::class, 'verifyOtpAndResetPassword'])->name('verifyOtpAndResetPassword');;


// ✅ Customer Routes
Route::prefix('customers')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

//client routes
Route::prefix('clients')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::put('/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
});

//appointment routes
Route::prefix('appointments')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::put('/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

//sevice routes
Route::prefix('services')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/', [ServiceController::class, 'store'])->name('services.store');             
    Route::get('/{id}', [ServiceController::class, 'show'])->name('services.show');
    Route::put('/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});