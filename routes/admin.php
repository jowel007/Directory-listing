<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ListingController;
// use App\Http\Controllers\Admin\ListingImageGallery;
use App\Http\Controllers\Admin\ListingImageGalleryController;
use App\Http\Controllers\Admin\ListingScheduleController;
use App\Http\Controllers\Admin\ListingVideoGallaryController;
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

    /** Amenities Routes */
    Route::resource('/amenity', AmenitiesController::class);

    /** Listing Routes */
    Route::resource('/listing', ListingController::class);

    /** Listing image gallery Routes */
    Route::resource('/listing-image-gallery', ListingImageGalleryController::class);

    /** Listing image gallery Routes */
    Route::resource('/listing-video-gallery', ListingVideoGallaryController::class);

    /** Listing Schedule Routes */
    Route::get('/listing-schedule/{listing_id}', [ListingScheduleController::class,'index'])->name('listing-schedule.index');
    Route::get('/listing-schedule/{listing_id}/create', [ListingScheduleController::class,'create'])->name('listing-schedule.create');
    Route::post('/listing-schedule/{listing_id}', [ListingScheduleController::class, 'store'])->name('listing-schedule.store');
    Route::get('/listing-schedule/{id}/edit', [ListingScheduleController::class, 'edit'])->name('listing-schedule.edit');
    Route::put('/listing-schedule/{id}', [ListingScheduleController::class, 'update'])->name('listing-schedule.update');
    Route::delete('/listing-schedule/{id}', [ListingScheduleController::class, 'destroy'])->name('listing-schedule.destroy');

});

