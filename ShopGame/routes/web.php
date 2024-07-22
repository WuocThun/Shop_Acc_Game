<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;

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

Route::get( '/', [ IndexController::class, 'home' ] );
Route::get( '/dich-vu', [ IndexController::class, 'dichvu' ] )
     ->name( 'dichvu' );// tat ca dich vu thuoc game
Route::get( '/dich-vu/{slug}', [ IndexController::class, 'dichvucon' ] )
     ->name( 'dichvucon' ); // dich vu con
Route::get( '/danh-muc-game/{slug}', [ IndexController::class, 'danhmuc' ] )
     ->name( 'danhmuc' ); // dich vu con
Route::get( '/danh-muc/{slug}', [ IndexController::class, 'danhmuccon' ] )
     ->name( 'danhmuccon' ); // dich vu con
Route::get('/blogs',[IndexController::class, 'blogs'])->name( 'blogs' );
Route::get('/blogs/{slug}',[IndexController::class, 'blog_detail'])->name( 'blog_detail' );
Auth::routes();

Route::get( '/home', [ HomeController::class, 'index' ] )->name( 'home' );
//category
Route::resource( '/category', CategoryController::class );
Route::resource( '/slider', SliderController::class );
Route::resource( '/blog',BlogController::class);
