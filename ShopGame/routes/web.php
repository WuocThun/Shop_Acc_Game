<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\NickController;
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

    Route::get('/', [IndexController::class, 'home']);
Route::get('/dich-vu', [IndexController::class, 'dichvu'])
     ->name('dichvu');// tat ca dich vu thuoc game
Route::get('/dich-vu/{slug}', [IndexController::class, 'dichvucon'])
     ->name('dichvucon'); // dich vu con
Route::get('/danh-muc-game/{slug}', [IndexController::class, 'danhmuc'])
     ->name('danhmuc'); // dich vu con
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuccon'])
     ->name('danhmuccon'); // dich vu con
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');;
Route::get('/videos', [IndexController::class, 'video_hightlight'])
     ->name('video_hightlight');
//Route::get('/show_video', [IndexController::class, 'show_video'])
//     ->name('show_video');
Route::get('/blogs/{slug}', [IndexController::class, 'blog_detail'])
     ->name('blog_detail');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//category
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/slider', SliderController::class)->middleware('auth');
Route::resource('/blog', BlogController::class)->middleware('auth');
Route::resource('/video', VideoController::class)->middleware('auth');
Route::resource('/accessories', AccessoriesController::class)->middleware('auth');
Route::resource('/nick', NickController::class)->middleware('auth');
Route::post('/choose_category', [NickController::class, 'choose_category'])->name('choose_category');
