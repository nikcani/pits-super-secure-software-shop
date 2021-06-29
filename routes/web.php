<?php

use App\Http\Controllers\OrderController;
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

Route::get('/', fn() => view('welcome'));

require __DIR__ . '/auth.php';

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth'])->name('dashboard');
Route::get('/dev', fn() => view('dev'))->middleware(['auth'])->name('dev');
Route::get('/order', [OrderController::class, 'create'])->middleware(['auth']);
