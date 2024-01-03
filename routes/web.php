<?php

use App\Http\Controllers\ActiveController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Admin\Main\IndexController as AdminMainIndexController;
use App\Http\Controllers\Admin\User\IndexController as AdminUserIndexController;
use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;
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

Route::middleware('auth')->group(function () {
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');
    Route::post('/matches/{match}/start', [MatchController::class, 'start'])->name('matches.start');

    Route::post('/matches/result/store', [MatchController::class, 'storeResults'])->name('matches.result.store');

    Route::get('/profile/{userId}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/{userId}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{userId}/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/balance', [BalanceController::class, 'index'])->name('balance');
    Route::post('/balance', [BalanceController::class, 'deposit'])->name('balance.deposit');
    Route::get('/balance/withdrawal', [BalanceController::class, 'withdrawalIndex'])->name('balance.withdrawal');
    Route::post('/balance/withdrawal', [BalanceController::class, 'withdrawal'])->name('balance.withdrawal');

    Route::post('/balance/withdrawal/{transferId}', [BalanceController::class, 'withdrawalAccept'])->name('balance.withdrawal.accept');
    Route::post('/balance/deposit/{transferId}', [BalanceController::class, 'depositAccept'])->name('balance.deposit.accept');
});




Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminMainIndexController::class, '__invoke'])->name('admin.main.index');
        Route::post('/winner/{winnerId}/', [MatchController::class, 'winner'])->name('admin.winner');

        Route::prefix('users')->group(function () {
            Route::get('/', [AdminUserIndexController::class, '__invoke'])->name('admin.user.index');
            Route::get('/post', [AdminUserCreateController::class, '__invoke'])->name('admin.user.post');
            Route::post('/', [AdminUserCreateController::class, '__invoke']) -> name('admin.user.store');
            Route::get('/{user}', [AdminUserCreateController::class, '__invoke']) -> name('admin.user.show');
            Route::get('/{user}/edit', [AdminUserCreateController::class, '__invoke']) -> name('admin.user.edit');
            Route::patch('/{user}', [AdminUserCreateController::class, '__invoke']) -> name('admin.user.update');
            Route::delete('/{user}', [AdminUserCreateController::class, '__invoke']) -> name('admin.user.delete');
        });
    });
});

Route::get('/rating', [RatingController::class, 'index'])->name('rating');

Route::get('/active', [ActiveController::class, 'index'])->name('active');



/*
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('/');
*/

require __DIR__.'/auth.php';
