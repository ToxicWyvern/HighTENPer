<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\UploadLeaderboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\CoureurController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FriendController;

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

Route::get('/leaderboards', [ScoreController::class, 'showScoresForm']);
Route::post('/leaderboards', [ScoreController::class, 'processScores'])->name('process.scores');

Route::get('/contact', function () {
    return view('contact');
});

// Route to display the dropdown form
Route::get('/coureurs', [CoureurController::class, 'showCoureurDropdown'])->name('showCoureurDropdown');

// Route to handle the form submission and display selected coureur details
Route::post('/coureurs', [CoureurController::class, 'showSelectedCoureur'])->name('showSelectedCoureur');

Auth::routes();

//Route::get('/contact', function () { return view('contact'); });

Route::get('/tracks', [RaceController::class, 'index']);

// Routes waarvoor je moet zijn ingelogd (gebruik: Route::get('/[route hier]', [App\Http\Controllers\[controllerNaam hier]Controller::class, 'index'])->name('[view naam hier]')->middleware('auth'); )
//Auth::routes();

Route::get('/dashboard', [ScoreController::class, 'dashboard'])->middleware('auth');

Route::get('/feed', [FeedController::class, 'feed'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.Profile')->middleware('auth');

Route::get('/editProfile', [ProfileController::class, 'editProfile'])
    ->name('profile.editProfile')
    ->middleware('auth');

// Route for updating the user profile (POST request)
Route::post('/editProfile', [ProfileController::class, 'updateProfile'])
    ->name('profile.updateProfile')
    ->middleware('auth');

Route::get('/successful', function () {
    return view('successful');
})->middleware('auth');

Route::post('/uploadLeaderboard', [ScoreController::class, 'submitScore'])->name('submitScore')->middleware('auth');

Route::get('/uploadLeaderboard', [ScoreController::class, 'showScoreForm'])->name('showScoreForm')->middleware('auth');



Route::get('/addFriends', [FriendController::class, 'showAddFriends'])->name('addFriends');

Route::post('/addFriends', [FriendController::class, 'toggleFollowUser'])->name('toggleFollow');


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

    Route::delete('/admin/manage/users/{id}', [AdminController::class, 'deleteUser'])
    ->middleware('auth')
    ->name('admin.deleteUser');

Route::put('/admin/manage/users/{id}/toggle-block', [AdminController::class, 'toggleBlockUser'])
    ->middleware('auth')
    ->name('admin.toggleBlockUser');

    Route::post('/admin/verifyScore/{score}', [AdminController::class, 'verifyScore'])->name('admin.verifyScore');

    Route::match(['post', 'delete'], '/admin/rejectScore/{id}', [AdminController::class, 'rejectScore'])
    ->name('admin.rejectScore');



