<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\API\AuthController;

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
