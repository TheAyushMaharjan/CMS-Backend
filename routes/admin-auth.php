<?php



use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);



});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    // User ManagementblogCategory
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/manageUser', [UserController::class, 'manageUser'])->name('manageUser'); // Manage Users
        Route::get('/managePermission', [UserController::class, 'managePermission'])->name('managePermission'); // Manage Permissions
        Route::post('/store', [UserController::class, 'store'])->name('store'); 

    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/blogCategory', [BlogController::class, 'blogCategory'])->name('blogCategory'); // Blog Categories
        Route::get('/blogCrud', [BlogController::class, 'blogCrud'])->name('blogCrud'); // Blog CRUD
    });


    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/gallerySetup', [MediaController::class, 'gallerySetup'])->name('gallerySetup'); // Manage Users
        Route::get('/preview', [MediaController::class, 'preview'])->name('preview'); // Manage Permissions
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/footerSetting', [SettingController::class, 'footerSetting'])->name('footerSetting'); // Manage Users
        Route::get('/headerSetting', [SettingController::class, 'headerSetting'])->name('headerSetting'); // Manage Permissions
    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});


