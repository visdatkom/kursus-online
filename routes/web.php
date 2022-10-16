<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Landing\CheckoutContoller;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Landing\CourseController as LandingCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home route
Route::get('/', HomeController::class)->name('home');
// course route
Route::controller(LandingCourseController::class)->as('course.')->group(function(){
    Route::get('/course/{course:slug}', 'show')->name('show');
    Route::get('/course/{course:slug}/{video:episode}', 'video')->name('video');
});
// cart route
Route::controller(CartController::class)->as('cart.')->group(function(){
    Route::get('/cart', 'index')->name('index');
    Route::post('/cart/{course}', 'store')->name('store');
    Route::delete('/cart/{cart}', 'delete')->name('destroy');
});
// checkout route
Route::get('/checkout', [CheckoutContoller::class, 'store'])->name('checkout.store');

// admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    // admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // admin tag route
    Route::resource('/tag', TagController::class);
    // admin category route
    Route::resource('/category', CategoryController::class);
    // admin course route
    Route::resource('/course', CourseController::class);
    // admin permission route
    Route::resource('/permission', PermissionController::class)->except('show', 'edit', 'create');
    // admin role route
    Route::resource('/role', RoleController::class)->except('show', 'edit', 'create');
    //admin user route
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile/{user}', [UserController::class, 'profileUpdate'])->name('user.profile.update');
    Route::put('/user/profile/password/{user}', [UserController::class, 'updatePassword'])->name('user.profile.password');
    Route::resource('/user', UserController::class)->only('index', 'update', 'destroy');
    // admin video route
    Route::controller(VideoController::class)->as('video.')->group(function(){
        Route::get('/{course:slug}/video', 'index')->name('index');
        Route::get('/{course:slug}/create', 'create')->name('create');
        Route::post('/{course:slug}/store', 'store')->name('store');
        Route::get('/edit/{course:slug}/{video}', 'edit')->name('edit');
        Route::put('/update/{course:slug}/{video}', 'update')->name('update');
        Route::delete('/delete/{video}', 'destroy')->name('destroy');
    });
    // admin transaction route
    Route::resource('/transaction', TransactionController::class)->only('index', 'show');
});
