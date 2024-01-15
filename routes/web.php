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

Auth::routes();

//Route::get('/contact', function () { return view('contact'); });

//Route::resource('races', RaceController::class);


// Routes waarvoor je moet zijn ingelogd (gebruik: Route::get('/[route hier]', [App\Http\Controllers\[controllerNaam hier]Controller::class, 'index'])->name('[view naam hier]')->middleware('auth'); )
//Auth::routes();

Route::get('/dashboard', [ScoreController::class, 'dashboard'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.Profile')->middleware('auth');

Route::get('/editProfile', [ProfileController::class, 'edit'])->name('profile.editProfile')->middleware('auth');

Route::put('/updateProfile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/successful', function () {
    return view('successful');
})->middleware('auth');

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

    Route::delete('/admin/manage/users/{id}', [AdminController::class, 'deleteUser'])
    ->middleware('auth')
    ->name('admin.deleteUser');

    Route::get('/admin/manage/leaderboards', [AdminController::class, 'manageScores'])
    ->middleware('auth')
    ->name('admin.manageLeaderboards');

Route::delete('/admin/manage/scores/{id}', [AdminController::class, 'deleteScore'])
    ->middleware('auth')
    ->name('admin.deleteLeaderboard');

    Route::get('/admin/manage/leaderboards', [AdminController::class, 'manageLeaderboards'])
    ->middleware('auth')
    ->name('admin.manageLeaderboards');

    Route::delete('/admin/manage/leaderboards/{id}', [AdminController::class, 'deleteLeaderboard'])
    ->middleware('auth')
    ->name('admin.deleteLeaderboard');

    Route::post('/admin/manage/leaderboards/{id}/approve', [AdminController::class, 'approveLeaderboard'])
    ->middleware('auth')
    ->name('admin.approveLeaderboard');

    Route::get('/manage_leaderboard', 'ScoreController@index')->name('manage_leaderboard.index');
    
    Route::patch('/scores/{score}/verify', 'ScoreController@verify')->name('scores.verify');

    Route::delete('/scores/{score}/reject', 'ScoreController@reject')->name('scores.reject');
