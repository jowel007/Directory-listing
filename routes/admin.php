<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/admin/login',[AdminAuthController::class,'Login'])->name('admin.login');
Route::get('/admin/forgot-password',[AdminAuthController::class,'PasswordRequest'])->name('admin.password.request');






Route::group([
    'middleware'=> ['auth','user.type:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

    //profile Route
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');

});

