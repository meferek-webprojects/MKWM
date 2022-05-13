<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShortTaskController;


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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dboard', [DashboardController::class, 'dashboard']);
});

/////////////////// AUTH SHORT PATHS /////////////////// 

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/change-theme', [ShortTaskController::class, 'change_theme']);
});


/////////////////// OTHERS ///////////////////

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
