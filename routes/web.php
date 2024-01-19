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

Route::get('/rules', function () {
    return view('rules');
});
// Route om de dropdown weer te geven voor coureurs
Route::get('/coureurs', [CoureurController::class, 'showCoureurDropdown'])->name('showCoureurDropdown');

// Route om de inzending van het formulier af te handelen en geselecteerde coureur -details weer te geven
Route::post('/coureurs', [CoureurController::class, 'showSelectedCoureur'])->name('showSelectedCoureur');

// Route om alle tracks te zien
Route::get('/tracks', [RaceController::class, 'index']);

// Routes waarvoor je moet zijn ingelogd (gebruik: ->middleware('auth'); )
Auth::routes();

// route voor dashboard
Route::get('/dashboard', [ScoreController::class, 'dashboard'])->middleware('auth');

// route voor feed
Route::get('/feed', [FeedController::class, 'feed'])->middleware('auth');

// route om je profiel aan te passen
Route::get('/editProfile', [ProfileController::class, 'editProfile'])
    ->name('profile.editProfile')
    ->middleware('auth');

// Route voor het bijwerken van het gebruikersprofiel
Route::post('/editProfile', [ProfileController::class, 'updateProfile'])
    ->name('profile.updateProfile')
    ->middleware('auth');


// route voor de succes pagina
Route::get('/successful', function () {
    return view('successful');
})->middleware('auth');


//routes om een score te uploaden
Route::post('/uploadLeaderboard', [ScoreController::class, 'submitScore'])->name('submitScore')->middleware('auth');

Route::get('/uploadLeaderboard', [ScoreController::class, 'showScoreForm'])->name('showScoreForm')->middleware('auth');


//routes om vrienden te volgen
Route::get('/addFriends', [FriendController::class, 'showAddFriends'])->name('addFriends');

Route::post('/addFriends', [FriendController::class, 'toggleFollowUser'])->name('toggleFollow');


// Routes waarvoor je admin moet zijn

// route voor manageUsers
Route::get('/admin/manage/users', [AdminController::class, 'manageUsers'])
    ->middleware('auth')
    ->name('admin.manageUsers');
// route om gebruikers te deleten
    Route::delete('/admin/manage/users/{id}', [AdminController::class, 'deleteUser'])
        ->middleware('auth')
        ->name('admin.deleteUser');
// route om gebruikers te blokkeren
    Route::put('/admin/manage/users/{id}/toggle-block', [AdminController::class, 'toggleBlockUser'])
        ->middleware('auth')
        ->name('admin.toggleBlockUser');
// route voor de admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');
// routes voor het beheren van scores
Route::get('/admin/manage/leaderboards', [AdminController::class, 'manageLeaderboards'])
    ->middleware('auth')
    ->name('admin.manageLeaderboards');

    Route::post('/admin/verifyScore/{score}', [AdminController::class, 'verifyScore'])->name('admin.verifyScore');

    Route::match(['post', 'delete'], '/admin/rejectScore/{id}', [AdminController::class, 'rejectScore'])
    ->name('admin.rejectScore');



