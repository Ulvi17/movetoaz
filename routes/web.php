<?php

use App\Http\Controllers\admin\RoutesController;
use App\Http\Controllers\admin\FunctionsController;
use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [RoutesController::class, 'index'])->name('admin.index');
        Route::get('/create_edit', [RoutesController::class, 'create_edit'])->name('admin.create_edit');
        Route::post('/store_update', [FunctionsController::class, 'store_update'])->name('admin.store_update');
        Route::delete('/destroy', [FunctionsController::class, 'destroy'])->name('admin.destroy');

        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/save', [AuthController::class, 'save'])->name('admin.profile.save');
        Route::post('/profile-update-avatar', [AuthController::class, 'updateAvatar'])->name('admin.update.avatar');
        Route::delete('delete_image', [FunctionsController::class, 'delete_image'])->name("delete.image");
    });
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/auth', [AuthController::class, 'auth'])->name('admin.auth');
    });
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [
    'setdomain',
    'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'
]], function () {
    Route::get('/', [RoutesController::class, 'frontindex'])->name('frontend.index');
    Route::get('/{slug}', [RoutesController::class, 'frontshow'])->name('frontend.show');
    Route::any('/page/contactus', [RoutesController::class, 'frontcontactus'])->name('frontend.contactus');
});
