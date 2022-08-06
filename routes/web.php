<?php

use App\Http\Controllers\Transaction\BankAccount\MoneyTransferredController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', MoneyTransferredController::class)->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
