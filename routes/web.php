<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomesController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BalanceController::class, 'index']);

Route::get('/incomes/create', [IncomesController::class, 'create']);
Route::post('/incomes/create', [IncomesController::class, 'store']);

Route::get('/expenses/create', [ExpensesController::class, 'create']);
Route::post('/expenses/create', [ExpensesController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', function(): RedirectResponse {
    Auth::logout();
    return redirect('/login');
});
