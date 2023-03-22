<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('blog', App\Http\Controllers\BlogController::class)->name('*', 'blog');
        Route::post('blog/insert', [App\Http\Controllers\BlogController::class, 'insert'])->name('blog.insert');
        Route::get('blog/show/{id}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
    });
});

