<?php

use Illuminate\Http\Request;
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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get(
    '/order',
    function (Request $request) {
        /*if (csrf_token() !== $request->get('_token')) {
            abort(403, 'csrf protection');
        }*/
        return "Sie haben erfolgreich " . $request->get(
                'amount'
            ) . " Lizenzen bestellt. Die Lizenzschlüssel wurden an die Adresse " . $request->get(
                'email'
            ) . " verschickt.";
        return [
            'session_token' => csrf_token(),
            'user' => auth()->user(),
            'request' => $request->all(),
        ];
    }
)->middleware(['auth']);
