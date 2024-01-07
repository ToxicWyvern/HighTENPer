<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\UploadLeaderboardController;
use App\Http\Controllers\UploadedLeaderboardsController;

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
Route::get('/', [App\Http\Controllers\ScoreController::class, 'welcome']);


Route::get('/leaderboard', function () {
    return view('leaderboards.mainLeaderboard');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('races', RaceController::class);

//routes you need to be logged in for (use: Route::get('/[route here]', [App\Http\Controllers\[controllerName here]Controller::class, 'index'])->name('[view name here]'); )
Auth::routes();

Route::get('/home', [App\Http\Controllers\ScoreController::class, 'home']);

Route::get('/uploadLeaderboard', [App\Http\Controllers\UploadLeaderboardController::class, 'index'])->name('leaderboards.uploadLeaderboard');

Route::get('/history', [App\Http\Controllers\UploadedLeaderboardsController::class, 'index'])->name('leaderboards.uploadedLeaderboards');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.Profile');

Route::get('/editProfile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.editProfile');



//routes you need to be admin for
Route::get('/admin/manage/leaderboards', function () {
    if (auth()->check() && auth()->user()->admin) {
        return view('admin.manageLeaderboards');
    } else {
        abort(403, 'Unauthorized.');
    }
})->middleware('auth')->name('admin.manageLeaderboards');

Route::get('/admin/manage/users', function () {
    if (auth()->check() && auth()->user()->admin) {
        return view('admin.manageUsers');
    } else {
        abort(403, 'Unauthorized.');
    }
})->middleware('auth')->name('admin.dashboard');

Route::get('/admin/dashboard', function () {
    if (auth()->check() && auth()->user()->admin) {
        return view('admin.dashboard');
    } else {
        abort(403, 'Unauthorized.');
    }
})->middleware('auth')->name('admin.dashboard');



