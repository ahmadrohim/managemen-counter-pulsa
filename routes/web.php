<?php

use App\Http\Controllers\PembeliController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [LoginController::class, 'index'] );
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logOut', [LoginController::class, 'logOut']);

Route::get('/dashboard', function(){
    return view('dashboard', [
        'tajuk_konten' => 'Dashboard',
        'active' => 'dashboard'
    ]);
});

Route::resource('/pembeli', PembeliController::class)->except('create');