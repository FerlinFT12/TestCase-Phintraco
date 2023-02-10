<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensimasukController;

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

Route::get('/',[HomeController::class, 'index'])->name('home2')->middleware('auth');
Route::get('/dashboard',[HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth',[LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('showuser', [UserController::class, 'showuser'])->name('showuser');
Route::resource('user', UserController::class)->middleware('auth');

Route::get('showprojects', [ProjectController::class, 'showprojects'])->name('showprojects');
Route::resource('project', ProjectController::class)->middleware('auth');

Route::resource('presensi', PresensiController::class)->middleware('auth');
// Route::match(['get', 'post'], 'presensi/store', [PresensiController::class, 'store'])->name('presensi.store');
Route::resource('presensimasuk', PresensimasukController::class)->middleware('auth');


Route::get('radius', [PresensiController::class, 'radiuscheck']);

Route::get('geo', [PresensiController::class, 'geo']);
Route::get('maps', [PresensiController::class, 'maps']);