<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'Index']);
Route::get('/detail/{id}', [FrontendController::class, 'ProfileDetail'])->name('profile.detail');
Route::get('/AboutUs', [FrontendController::class, 'AboutUs'])->name('aboutus');
Route::get('/PrivacyPolicy', [FrontendController::class, 'PrivacyPolicy'])->name('privacy');

Route::get('/dashboard', function () {
    return view('admin.admin_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';


//Admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

    /// users All Route
    Route::controller(UsersController::class)->group(function () {
        Route::get('/all/users', 'AllUsers')->name('all.users');
        Route::get('/add/user', 'AddUser')->name('add.user');
        Route::post('/store/user', 'StoreUser')->name('user.store');
        Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('user.update');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    });
}); //End of Admin group middleware