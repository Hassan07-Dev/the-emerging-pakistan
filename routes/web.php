<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/migrate/country', function(){
    Artisan::call('migrate', ['--path' => '/database/migrations/2022_09_28_123424_create_countries_table.php']);
});

Route::get('/migrate/cities', function(){
    Artisan::call('migrate', ['--path' => '/database/migrations/2022_09_28_124310_create_cities_table.php']);
});

Route::get('/migrate', function(){
    Artisan::call('migrate', ['--force' => true]);
});

Route::get('/rollback', function(){
    Artisan::call('migrate:rollback');
});

Route::get('/adminseeder', function(){
    Artisan::call('db:seed');
});

Route::get('/categories/seeder', function(){
    Artisan::call('db:seed', ['--class' => 'CategorySeeder']);
});

Route::get('site/shutdown', function(){
    return Artisan::call('down', ['--secret' => "1630542a-246b-4b66-afa1"]);
});

Route::get('site/live', function(){
    return Artisan::call('up');
});

Route::controller (HomeController::class)->group (function (){
    Route::get ('/', 'index')->name ('home.index');
});

Route::controller (AuthController::class)->group (function (){
    Route::get('verify_email/{key}', 'verifyEmail')->name('user.verify');
    Route::get('register', 'register')->name('user.signup');
    Route::post('register', 'registerPost')->name('user.signup.post');
    Route::post('fetch/cities', 'getCities')->name('user.fetch.citiess');
    Route::get('login', 'index')->name('user.login');
    Route::post('login', 'loginPost')->name('user.login.post');
    Route::get('forgot/password', 'forgotPassword')->name('user.forgot.password')->middleware('guest');
    Route::post('forgot/password', 'forgotPasswordPost')->name('user.forgot.password.post');
    Route::get('/verify/forgot-password/{token}', 'resetPassword')->name('user.verify.forgot.password');
    Route::post('/update/password', 'updatePassword')->name('user.update.password');
    Route::get('logout', 'logout')->name('user.logout');
    Route::post('/update/profile', 'updateProfile')->name('user.update.profile')->middleware(['auth','isBlocked']);
});

Route::prefix('blog')->group(function () {
    Route::controller (BlogController::class)->group (function (){
        Route::get ('/{category?}', 'index')->name ('blog.index');
        Route::get ('details/{slug}', 'blogDetails')->name ('blog.details');
        Route::get ('/category/list', 'categoryList')->name ('blog.categoryList');
    });
});

Route::middleware(['auth','isBlocked'])->group(function () {
    Route::prefix('user/blog')->group(function () {
        Route::controller (BlogController::class)->group (function (){
            Route::get ('/write-for-us/{id?}', 'writeBlog')->name ('blog.writeBlog');
            Route::post ('/create', 'create')->name ('blog.create');
            Route::get ('/delete/{id}', 'blogDelete')->name ('blog.delete');
            Route::post ('/edit', 'blogEdit')->name ('blog.edit');

        });
    });
    Route::prefix('user')->group(function () {
        Route::controller (AuthController::class)->group (function (){
            Route::get ('/profile-setting', 'userProfile')->name ('profile.setting');
        });
    });
});



Route::prefix('faq')->group(function () {
    Route::controller (FaqController::class)->group (function (){
        Route::get ('/', 'index')->name ('faq.index');
    });
});

Route::prefix('contact-us')->group(function () {
    Route::controller (ContactUsController::class)->group (function (){
        Route::get ('/', 'index')->name ('contactUs.index');
    });
});

Route::prefix('about')->group(function () {
    Route::controller (AboutUsController::class)->group (function (){
        Route::get ('/', 'index')->name ('about.index');
    });
});

Route::controller (CommentController::class)->group (function (){
    Route::post ('/add_comments', 'index')->name ('add_comments.index');
    Route::post ('/comments/list', 'show')->name ('comments.list');
});
