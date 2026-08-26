<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Support\Facades\Route;


Route::get('/leaderboard/save', [LeaderboardController::class, 'saveWeeklyWinner'])
    ->name('leaderboard.save');

// Public welcome page (background image + login/register)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Protected routes (only for logged-in users)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('tasks', TaskController::class);

 /*  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');*/
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
