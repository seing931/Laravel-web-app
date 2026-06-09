<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;

Route::view('/','posts.index')->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware('verified')->name('dashboard');
    Route::get('/dept', [MaintenanceController::class,'dept'])->name('dept');
    Route::delete('/dept/{id}', [MaintenanceController::class, 'deldept'])->name('dept.delete');
    Route::get('/deptdetail/{id?}', [MaintenanceController::class, 'editdept'])->name('dept.edit');
    Route::post('/dept/store', [MaintenanceController::class, 'savedept'])->name('dept.store');
    Route::put('/dept/update/{id}', [MaintenanceController::class, 'savedept'])->name('dept.update');
    Route::get('/role', [MaintenanceController::class,'role'])->name('role');
    Route::delete('/role/{id}', [MaintenanceController::class, 'delrole'])->name('role.delete');
    Route::get('/roledetail/{id?}', [MaintenanceController::class, 'editrole'])->name('role.edit');
    Route::post('/role/store', [MaintenanceController::class, 'saverole'])->name('role.store');
    Route::put('/role/update/{id}', [MaintenanceController::class, 'saverole'])->name('role.update');
    Route::post('/user/store', [MaintenanceController::class, 'saveuser'])->name('user.store');
    Route::get('/mguser', [MaintenanceController::class,'user'])->name('user');
    Route::get('/mguserdetail/{id?}', [MaintenanceController::class, 'edituser'])->name('user.edit');
    Route::delete('/mguser/{id}', [MaintenanceController::class, 'deluser'])->name('user.delete');
    Route::put('/user/update/{id}', [MaintenanceController::class, 'saveuser'])->name('user.update');
    Route::get('/profile', [HomeController::class,'profile'])->name('profile');
    Route::post('/profile', [HomeController::class, 'updateprofile'])->name('profile');
    Route::get('/resetpassword', [HomeController::class,'resetpassword'])->name('resetpassword');
    Route::post('/resetpassword', [HomeController::class, 'updatepassword'])->name('resetpassword');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/email/verify',[AuthController::class,'verifynotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',[AuthController::class,'verifyemail'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification',[AuthController::class,'verifyhandler'])->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware('guest')->group(function(){
    Route::view('/register','auth.register')->name('register');
    Route::post('/register', [AuthController::class,'register']);
    
    Route::view('/login','auth.login')->name('login');
    Route::post('/login', [AuthController::class,'login']);
});

