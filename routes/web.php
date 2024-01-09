<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\UploadLeaderboardController;
use App\Http\Controllers\UploadedLeaderboardsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaderboardController;

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
Route::get('/', [LeaderboardController::class, 'index'])->name('leaderboard.index');

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
Route::get('/admin/manage/leaderboards', [AdminController::class, 'manageLeaderboards'])
    ->middleware('auth')
    ->name('admin.manageLeaderboards');

Route::get('/admin/manage/users', [AdminController::class, 'manageUsers'])
    ->middleware('auth')
    ->name('admin.manageUsers');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');
