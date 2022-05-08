<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
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

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    dd("Cache Clear All");
});

Route::controller (AdminController::class)->group (function (){
    Route::get ('/', 'index')->name ('admin');
    Route::get ('login', 'index')->name ('admin.login');
    Route::post ('login', 'loginCheck')->name ('admin.login');
    Route::get('/logout','logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::name('admin.')->group(function () {
        Route::controller (DashboardController::class)->group (function (){
            Route::get ('/dashboard', 'index')->name ('dashboard');
        });

        Route::prefix('blog')->group(function () {
            Route::controller (TagController::class)->group (function (){
                Route::get ('/tags', 'index')->name ('tags');
                Route::get ('/tags/list', 'edit')->name ('tags.list');
                Route::post ('/tags/create', 'create')->name ('tags.create');
                Route::post ('/tags/delete', 'destroy')->name ('tags.delete');
                Route::post ('/tags/show', 'show')->name ('tags.show');
                Route::post ('/tags/update', 'update')->name ('tags.update');
            });

            Route::controller (BlogCategoryController::class)->group (function (){
                Route::get ('/category', 'index')->name ('blogCategory');
                Route::get ('/category/list', 'edit')->name ('category.list');
                Route::post ('/category/create', 'create')->name ('category.create');
                Route::post ('/category/delete', 'destroy')->name ('category.delete');
                Route::post ('/category/show', 'show')->name ('category.show');
                Route::post ('/category/update', 'update')->name ('category.update');
            });

            Route::controller (BlogController::class)->group (function (){
                Route::get ('/list', 'index')->name ('list');
                Route::get ('/blog/list', 'edit')->name ('blog.list');
                Route::post ('/blog/create', 'create')->name ('blog.create');
                Route::post ('/blog/delete', 'destroy')->name ('blog.delete');
                Route::post ('/blog/show', 'show')->name ('blog.show');
                Route::post ('/blog/update', 'update')->name ('blog.update');
            });
        });
    });
});
