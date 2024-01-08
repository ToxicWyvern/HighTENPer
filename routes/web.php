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
| Hier kun je webroutes registreren voor je applicatie. Deze routes worden
| geladen door de RouteServiceProvider en worden allemaal toegewezen aan de
| "web" middleware-groep. Maak iets geweldigs!
|
*/

// Routes die voor iedereen toegankelijk zijn
Route::get('/', [ScoreController::class, 'welcome']);

Route::get('/leaderboard', function () { return view('leaderboards.mainLeaderboard'); });

Route::get('/contact', function () { return view('contact'); });

Route::resource('races', RaceController::class);


// Routes waarvoor je moet zijn ingelogd (gebruik: Route::get('/[route hier]', [App\Http\Controllers\[controllerNaam hier]Controller::class, 'index'])->name('[view naam hier]')->middleware('auth'); )
Auth::routes();

Route::get('/home', [ScoreController::class, 'home'])->middleware('auth');

Route::get('/history', [UploadedLeaderboardsController::class, 'index'])->name('leaderboards.uploadedLeaderboards')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.Profile')->middleware('auth');

Route::get('/editProfile', [ProfileController::class, 'edit'])->name('profile.editProfile')->middleware('auth');

Route::get('/successful', function () { return view('successful'); })->middleware('auth');

Route::post('/uploadLeaderboard', [ScoreController::class, 'submitScore'])->name('submitScore')->middleware('auth');

Route::get('/uploadLeaderboard', [ScoreController::class, 'showScoreForm'])->name('showScoreForm')->middleware('auth');




// Routes waarvoor je admin moet zijn
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


