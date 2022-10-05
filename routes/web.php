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
    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/course', App\Http\Controllers\Admin\CourseController::class);
});
