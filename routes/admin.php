<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientTestimonialsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TrendingNewsController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get ('login', 'index')->name ('admin.login');;
    Route::post ('login', 'loginCheck')->name ('admin.login');
    Route::get('/logout','logout')->name('admin.logout');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::name('admin.')->group(function () {
        Route::controller (DashboardController::class)->group (function (){
            Route::get ('/dashboard', 'index')->name ('dashboard');
        });

        Route::prefix('logo')->group(function () {
            Route::controller (LogoController::class)->group (function (){
                Route::get ('/', 'index')->name ('logo');
                Route::post ('/update', 'update')->name ('logo.update');
            });
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
                Route::get ('/blog/users/list', 'editUsers')->name ('blog.list.users');
                Route::post ('/blog/create', 'create')->name ('blog.create');
                Route::post ('/blog/delete', 'destroy')->name ('blog.delete');
                Route::post ('/blog/show', 'show')->name ('blog.show');
                Route::post ('/blog/update', 'update')->name ('blog.update');
            });
        });

        Route::prefix('user')->group(function () {
            Route::controller (BlogController::class)->group (function (){
                Route::get ('/blogs', 'userIndex')->name ('users.blogs');
                Route::post ('/blog/user/change-status', 'statusChange')->name ('blog.users.status');
            });
            Route::controller (CommentController::class)->group (function (){
                Route::get ('/comments', 'index')->name ('users.comments.index');
                Route::get ('/comments/lists', 'commentsList')->name ('users.comments.list');
                Route::post ('/comments/change-status', 'statusChange')->name ('users.comments.status');
                Route::post ('/comments/delete', 'destroy')->name ('users.comments.delete');
            });

        });

        Route::controller (TrendingNewsController::class)->group (function (){
            Route::get ('/news', 'index')->name ('news');
            Route::get ('/news/list', 'edit')->name ('news.list');
            Route::post ('/news/create', 'create')->name ('news.create');
            Route::post ('/news/delete', 'destroy')->name ('news.delete');
            Route::post ('/news/show', 'show')->name ('news.show');
            Route::post ('/news/update', 'update')->name ('news.update');
        });

        Route::controller (UserController::class)->group (function (){
            Route::get ('/users', 'index')->name ('users');
            Route::get ('/users/list', 'edit')->name ('users.list');
//            Route::post ('/users/create', 'create')->name ('users.create');
            Route::post ('/users/delete', 'destroy')->name ('users.delete');
            Route::post ('/usesr/block', 'block')->name ('users.block');
            Route::post ('/usesr/view', 'viewUser')->name ('users.view.status');
            Route::post ('/users/show', 'show')->name ('users.show');
//            Route::post ('/users/update', 'update')->name ('users.update');
        });
        Route::controller (PageController::class)->group (function (){
            Route::get ('/', 'index')->name ('pages');
            Route::post ('/pages/data', 'fetchPageData')->name ('pages.fetch');
            Route::post ('/pages/update', 'pageDataUpdate')->name ('pages.update');
        });

    });
});
