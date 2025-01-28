<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['revalidate_back']],function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');

    Route::group(['middleware'=>['guest_authentication']],function(){
        Route::get('/registration',[AuthController::class, 'register'])->name('register');
        Route::post('/registration/submit',[AuthController::class, 'reg_submit'])->name('reg_submit');
        Route::get('/auth/verify-mail/{verification_code}',[AuthController::class, 'verify_mail'])->name('verify_mail');
        
        Route::get('/login',[AuthController::class, 'login'])->name('login');
        Route::post('/login/submit',[AuthController::class, 'log_submit'])->name('log_submit');
        Route::get('/forget-password',[AuthController::class, 'forget_password'])->name('forget_password');
        Route::post('/forget-password/submit',[AuthController::class, 'forget_password_submit'])->name('forget_password_submit');
        Route::get('/reset-password/{reset_code}',[AuthController::class, 'reset_password'])->name('reset_password');
        Route::post('/reset-password-submit/{reset_code}',[AuthController::class, 'reset_password_submit'])->name('reset_password_submit');
    });
  
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('authentication');
    
    Route::group(['middleware'=>['authentication']],function(){
        Route::get('/profile/edit-profile',[ProfileController::class, 'edit_profile'])->name('edit_profile');
        Route::put('/profile/update-profile',[ProfileController::class, 'update_profile'])->name('update_profile');
        Route::get('/profile/edit-password',[ProfileController::class, 'edit_password'])->name('edit_password');
        Route::put('/profile/update-password',[ProfileController::class, 'update_password'])->name('update_password');
    });
});

