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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('/tag', App\Http\Controllers\Admin\TagController::class);
    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/course', App\Http\Controllers\Admin\CourseController::class);
    Route::controller(App\Http\Controllers\Admin\VideoController::class)->as('video.')->group(function(){
        Route::get('/{course:slug}/video', 'index')->name('index');
        Route::get('/{course:slug}/create', 'create')->name('create');
        Route::post('/{course:slug}/store', 'store')->name('store');
        Route::get('/edit/{course:slug}/{video}', 'edit')->name('edit');
        Route::put('/update/{course:slug}/{video}', 'update')->name('update');
        Route::delete('/delete/{video}', 'destroy')->name('destroy');
    });
});
