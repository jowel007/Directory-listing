<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LocationController;
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
    Route::put('/profile-password',[ProfileController::class,'PasswordUpdate'])->name('profile-password.update');


    //hero route
    Route::get('/hero',[HeroController::class,'index'])->name('hero.index');
    Route::put('/hero',[HeroController::class,'update'])->name('hero.update');

    /** Category Routes */
    Route::resource('/category', CategoryController::class);

    /** Location Routes */
    Route::resource('/location', LocationController::class);



});

