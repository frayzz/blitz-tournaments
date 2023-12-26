<?php

use App\Http\Controllers\ActiveController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MatchController::class, 'index'])->name('/');
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');
Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');

Route::get('/rating', [RatingController::class, 'index'])->name('rating');

Route::get('/active', [ActiveController::class, 'index'])->name('active');

Route::get('/profile/{userId}', [ProfileController::class, 'index'])->name('profile');
/*
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('/');
*/

require __DIR__.'/auth.php';
