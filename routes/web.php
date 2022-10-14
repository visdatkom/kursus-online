<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', App\Http\Controllers\HomeController::class);
// course route
Route::controller(App\Http\Controllers\Landing\CourseController::class)->as('course.')->group(function(){
    Route::get('/course/{course:slug}', 'show')->name('show');
    Route::get('/course/{course:slug}/{video:episode}', 'video')->name('video');
});
// cart route
Route::controller(App\Http\Controllers\Landing\CartController::class)->as('cart.')->group(function(){
    Route::get('/cart', 'index')->name('index');
    Route::post('/cart/{course}', 'store')->name('store');
    Route::delete('/cart/{cart}', 'delete')->name('destroy');
});

// admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    // admin dashboard route
    Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    // admin article route
    Route::resource('/article', App\Http\Controllers\Admin\ArticleController::class);
    // admin tag route
    Route::resource('/tag', App\Http\Controllers\Admin\TagController::class);
    // admin category route
    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
    // admin course route
    Route::resource('/course', App\Http\Controllers\Admin\CourseController::class);
    // admin video route
    Route::controller(App\Http\Controllers\Admin\VideoController::class)->as('video.')->group(function(){
        Route::get('/{course:slug}/video', 'index')->name('index');
        Route::get('/{course:slug}/create', 'create')->name('create');
        Route::post('/{course:slug}/store', 'store')->name('store');
        Route::get('/edit/{course:slug}/{video}', 'edit')->name('edit');
        Route::put('/update/{course:slug}/{video}', 'update')->name('update');
        Route::delete('/delete/{video}', 'destroy')->name('destroy');
    });
    // admin transaction route
    Route::get('/transaction', App\Http\Controllers\Admin\TransactionController::class)->name('transaction.index');
});
