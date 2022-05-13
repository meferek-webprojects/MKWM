<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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



/////////////////// LANDING PAGE ///////////////////

Route::get('/', function () {
    return view('main.main');
});

Route::get('/photoshoot', function () {
    return view('main.photoshoot');
});

Route::get('/logout', function () {
    if(Auth::check()) Auth::logout();
    return redirect('/');
});



/////////////////// AUTH /////////////////// 

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
});



/////////////////// OTHERS ///////////////////

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
