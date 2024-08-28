<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MyCourseController;
use App\Http\Controllers\Admin\ShowcaseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Landing\CheckoutContoller;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\NotificationDatabaseController;
use App\Http\Controllers\Member\VideoController as MemberVideoController;
use App\Http\Controllers\Member\CourseController as MemberCourseController;
use App\Http\Controllers\Member\ReviewController as MemberReviewController;
use App\Http\Controllers\Landing\CourseController as LandingCourseController;
use App\Http\Controllers\Landing\ReviewController as LandingReviewController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Member\MyCourseController as MemberMyCourseController;
use App\Http\Controllers\Member\ShowcaseController as MemberShowcaseController;
use App\Http\Controllers\Landing\CategoryController as LandingCategoryController;
use App\Http\Controllers\Landing\ShowcaseController as LandingShowcaseController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\TransactionController as MemberTransactionController;

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
    Route::get('/course', 'index')->name('index');
    Route::get('/course/{course:slug}', 'show')->name('show');
    Route::get('/course/{course:slug}/{video:episode}', 'video')->name('video');
});
// category route
Route::get('/category/{category:slug}', LandingCategoryController::class)->name('category');
// review route
Route::get('/review', LandingReviewController::class)->name('review');
// showcase route
Route::get('/showcase', LandingShowcaseController::class)->name('showcase');
// cart route
Route::controller(CartController::class)->middleware('auth')->as('cart.')->group(function(){
    Route::get('/cart', 'index')->name('index');
    Route::post('/cart/{course}', 'store')->name('store');
    Route::delete('/cart/{cart}', 'delete')->name('destroy');
});
// checkout route
Route::get('/checkout', [CheckoutContoller::class, 'store'])->name('checkout.store');

// admin route
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    // admin dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // admin marknotification route
    Route::controller(NotificationDatabaseController::class)->group(function(){
        Route::post('/mark-as-read/{id}', 'readNotification')->name('markNotification');
        Route::post('/mark-all-read', 'readAllNotification')->name('markAllRead');
    });
    // admin category route
    Route::resource('/category', CategoryController::class);
    // admin course route
    Route::resource('/course', CourseController::class);
    // admin mycourse route
    Route::controller(MyCourseController::class)->group(function(){
        Route::get('/my-course', 'index')->name('mycourse');
        Route::get('/my-course/{id}/certificate', 'certificate')->name('mycourse.certificate');
        Route::get('/my-course/{id}/quiz', 'quiz')->name('mycourse.quiz');
        Route::post('/my-course/{id}/quiz', 'quizStore')->name('mycourse.quiz.store');
    });
    // Route::get('/my-course', MyCourseController::class)->name('mycourse');
    // admin showcase route
    Route::get('/showcase', ShowcaseController::class)->name('showcase.index');

    // admin review route
    Route::controller(ReviewController::class)->group(function(){
        Route::get('/review', 'index')->name('review.index');
        Route::post('/review/{course}', 'store')->name('review');
    });
    //admin user route
    Route::controller(UserController::class)->as('user.')->group(function(){
        Route::get('/user/profile', 'profile')->name('profile');
        Route::put('/user/profile/{user}', 'profileUpdate')->name('profile.update');
        Route::get('/user/profile/password/{user}', 'profile')->name('profile.password');
    });
    Route::resource('/user', UserController::class)->only('index', 'update', 'destroy');
    // admin video route
    Route::controller(VideoController::class)->as('video.')->group(function(){
        Route::get('/course/{course:slug}/video', 'index')->name('index');
        Route::get('/course/{course:slug}/create', 'create')->name('create');
        Route::post('/course/{course:slug}/store', 'store')->name('store');
        Route::get('/course/edit/{course:slug}/{video}', 'edit')->name('edit');
        Route::put('/course/update/{course:slug}/{video}', 'update')->name('update');
        Route::delete('/course/delete/{video}', 'destroy')->name('destroy');
    });
    // admin quiz route
    Route::controller(QuizController::class)->as('quiz.')->group(function(){
        Route::get('/quiz/{quiz}/questions', 'questionIndex')->name('questions.index');
        Route::get('/quiz/{quiz}/questions/create', 'questionCreate')->name('questions.create');
        Route::post('/quiz/{quiz}/questions/store', 'questionStore')->name('questions.store');
        Route::get('/quiz/{quiz}/questions/edit/{question}', 'questionEdit')->name('questions.edit');
        Route::put('/quiz/{quiz}/questions/update/{question}', 'questionUpdate')->name('questions.update');
        Route::delete('/quiz/{quiz}/questions/delete/{question}', 'questionDestroy')->name('questions.destroy');
    });
    Route::resource('/quiz', QuizController::class);
    // admin transaction route
    Route::resource('/transaction', TransactionController::class)->only('index', 'show');

});

// member route
Route::group(['as' => 'member.', 'prefix' => 'account', 'middleware' => ['auth', 'role:member|author']], function(){
    // member dashboard route
    Route::get('/dashboard', MemberDashboardController::class)->name('dashboard');
    // member course route
    Route::controller(MemberMyCourseController::class)->group(function(){
        Route::get('/my-course', 'index')->name('mycourse');
        Route::get('/my-course/{id}/certificate', 'certificate')->name('mycourse.certificate');
        Route::get('/my-course/{id}/quiz', 'quiz')->name('mycourse.quiz');
        Route::post('/my-course/{id}/quiz', 'quizStore')->name('mycourse.quiz.store');
    });
    Route::resource('/course', MemberCourseController::class)->middleware('role:author');
    // member showcase route
    Route::resource('/showcase', MemberShowcaseController::class);
    // member video route
    Route::controller(MemberVideoController::class)->as('video.')->middleware('role:author')->group(function(){
        Route::get('/{course:slug}/video', 'index')->name('index');
        Route::get('/{course:slug}/create', 'create')->name('create');
        Route::post('/{course:slug}/store', 'store')->name('store');
        Route::get('/edit/{course:slug}/{video}', 'edit')->name('edit');
        Route::put('/update/{course:slug}/{video}', 'update')->name('update');
        Route::delete('/delete/{video}', 'destroy')->name('destroy');
    });
    // member review route
    Route::post('/review/{course}', [MemberReviewController::class, 'store'])->name('review');
    // member transaction route
    Route::resource('/transaction', MemberTransactionController::class)->only('index', 'show');
    // member profile route
    Route::controller(MemberProfileController::class)->as('profile.')->group(function(){
        Route::get('/profile', 'index')->name('index');
        Route::put('/profile/{user}', 'updateProfile')->name('update');
        Route::put('/profile/password/{user}', 'updatePassword')->name('password');
    });
});
