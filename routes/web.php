<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
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

Route::get('/migrate', function(){
    Artisan::call('migrate', ['--force' => true]);
});

Route::get('/rollback', function(){
    Artisan::call('migrate:rollback');
});

Route::get('/adminseeder', function(){
    Artisan::call('db:seed');
});

Route::controller (HomeController::class)->group (function (){
    Route::get ('/', 'index')->name ('home.index');
});

Route::prefix('services')->group(function () {
    Route::controller (ServicesController::class)->group (function (){
        Route::get ('/', 'index')->name ('services.index');
        Route::get ('details/{slug}', 'details')->name ('services.details');
    });
});

Route::prefix('blog')->group(function () {
    Route::controller (BlogController::class)->group (function (){
        Route::get ('/', 'index')->name ('blog.index');
        Route::get ('details/{slug}', 'blogDetails')->name ('blog.details');
        Route::post ('/list', 'blogList')->name ('blog_list');

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
