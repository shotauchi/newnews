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


use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create','add')->name('news.add');
    Route::post('news/create','create')->name('news.create');
    Route::get('news','index')->name('news.index');
});

// //課題3-3
// use App\Http\Controllers\AAAController;
//     Route::get('/XXX',[AAAController::class,'bbb']);


//課題3-4
use App\Http\Cntrollers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('Profile/create','add');
    Route::get('Profile/create','edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
