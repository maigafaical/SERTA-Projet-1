<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('dashboard', [AuthentificationController::class, 'dashboard'])->name('dashboard');

Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');



Route::resource('transactions', TransactionsController::class);
Route::get('supprimer-transactions/{id}', [TransactionsController::class, 'destroy']);


Route::resource('transfert', TransfertController::class);
Route::get('supprimer-transfertController/{id}', [TransfertController::class, 'destroy']);





Route::post('/login', [AuthentificationController::class, 'login'])->name('login');
Route::get('/logout', [AuthentificationController::class, 'logout'])->name('logout');

// Route::post('/contact', [ContactController::class, 'contactpost'])->name('contactpost');
// Route::get('contact', [ContactController::class, 'index'])->name('contact');
