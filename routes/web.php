<?php
////////////////// METHODS //////////////////

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShortTaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SessionFilesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ZipController;



/////////////////// LANDING PAGE ///////////////////

Route::get('/', function () {
    return view('main.main');
});

Route::get('/movie', function () {
    return view('main.movie');
});

Route::get('/studio', function () {
    return view('main.studio');
});

Route::get('/plener', function () {
    return view('main.plener');
});

Route::get('/event', function () {
    return view('main.event');
});

Route::get('/product', function () {
    return view('main.product');
});

Route::get('/kontakt', function () {
    return view('main.contact');
});

Route::get('/polityka-i-ciasteczka', function () {
    return view('main.politics');
});

Route::get('/logout', function () {
    if(Auth::check()) Auth::logout();
    return redirect('/');
});

Route::post('/wiadomosc', [ShortTaskController::class, 'send_mail']);



/////////////////// AUTH /////////////////// 

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dboard', [DashboardController::class, 'dashboard']);
    Route::get('/account', [DashboardController::class, 'account']);

    Route::resource('user', UserController::class)->except(['index','create', 'destroy']);
    Route::resource('testimonial', TestimonialController::class)->except(['index', 'destroy']);

});



/////////////////// AUTH SHORT PATHS /////////////////// 

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/change-theme', [ShortTaskController::class, 'change_theme']);
    Route::post('/download-all', [ZipController::class, 'download_all']);
    Route::get('/faq', [ShortTaskController::class, 'faq']);    

});



/////////////////// ADMIN AUTH PATHS/////////////////// 

Route::middleware(['auth', 'verified', 'adminaccess'])->group(function () {

    Route::resource('user', UserController::class)->only(['index','create', 'destroy']);
    Route::resource('testimonial', TestimonialController::class)->only(['index','destroy']);
    Route::resource('session', SessionController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('sessionfiles', SessionFilesController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('news', NewsController::class);

    Route::get('/portfolio-photo', [PortfolioController::class, 'photo_index']);
    Route::get('/portfolio-video', [PortfolioController::class, 'video_index']);
    Route::post('/usun', [PortfolioController::class, 'usun']);
    Route::get('/faq', [ShortTaskController::class, 'faq']);
    Route::post('/change-privacy', [ShortTaskController::class, 'change_privacy']);
    Route::post('/testimonial-aproved', [TestimonialController::class, 'testimonial_aproved']);
    
});

/////////////////// OTHERS ///////////////////

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
