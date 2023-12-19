<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;

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


//routes that everyone can acces
Route::get('/check-auth', function () {
    return auth()->check() ? 'Authenticated' : 'Not Authenticated';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/leaderboard', function () {
    return view('leaderboards.mainLeaderboard');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('races', RaceController::class);

//routes you need to be logged in for (use: Route::get('/[route here]', [App\Http\Controllers\[controllerName here]Controller::class, 'index'])->name('[view name here]'); )
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/uploadLeaderboard', [App\Http\Controllers\UploadLeaderboardController::class, 'index'])->name('leaderboards.uploadLeaderboard');

Route::get('/history', [App\Http\Controllers\UploadedLeaderboardsController::class, 'index'])->name('leaderboards.uploadedLeaderboards');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.Profile');

Route::get('/editProfile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.editProfile');

//Route::middleware(['checkAdmin'])->group(function () {
//    Route::get('/admin/dashboard', function () {
//        return view('admin.dashboard');
//    })->name('admin.dashboard');
//});

//Route::get('/admin/dashboard', function () {
//    return view('admin.dashboard');
//})->name('admin.dashboard');

//Route::get('/user-info', function () {
//    return auth()->check() ? auth()->user() : 'Not Authenticated';
//});


