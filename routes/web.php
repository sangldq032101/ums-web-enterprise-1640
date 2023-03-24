<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
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
Route::get('/login', [LoginController::class, 'getLogin'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'postLogin']);
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkPass'])->group(function () {
        Route::get('/', [MainController::class, 'index']);
    });
    Route::get('/account/set-up-password', [LoginController::class, 'getSetupPassword']);
    Route::post('/account/set-up-password', [LoginController::class, 'postSetupPassword']);
    Route::get('/logout', [LoginController::class, 'logOut']);
});
