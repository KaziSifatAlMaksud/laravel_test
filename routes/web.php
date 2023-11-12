<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

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

//For Signup Page
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);



//For Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//After Login Successfull
Route::get('/dashbord', function () {
    return view("dashbord");
});

Route::get('/create_transaction', [TransactionController::class, 'showCreateForm']);


//for Psot /deposit & /withdrawal oparation do in here... 
Route::post('/create_transaction', [TransactionController::class, 'processTransaction'])->name('process_transaction');




Route::get('/',  [TransactionController::class, 'showAllTransactions']);

Route::get('/deposit',  [TransactionController::class, 'showDepositedTransactions']);
//Route::post('/deposit',  [TransactionController::class, 'processDeposit']);

Route::get('/withdrawal',  [TransactionController::class, 'showWithdrawalTransactions']);
//Route::post('/withdrawal', [TransactionController::class, 'processWithdrawal']);

