<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensimasukController;
use App\Http\Controllers\SPDController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TestingController;
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
Route::get('import', [HomeController::class,'import'])->name('import');
Route::get('/chartjs', [HomeController::class, 'chartjs']);
Route::get('/dashboard',[HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth',[LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('showuser', [UserController::class, 'showuser'])->name('showuser');
Route::get('user/importuser', [UserController::class, 'importuser'])->name('user.importuser')->middleware('auth');
Route::post('user/prosesimportuser', [UserController::class, 'prosesimportuser'])->name('user.prosesimportuser')->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');

Route::get('showprojects', [ProjectController::class, 'showprojects'])->name('showprojects');
Route::resource('project', ProjectController::class)->middleware('auth');

Route::resource('presensi', PresensiController::class)->middleware('auth');
// Route::match(['get', 'post'], 'presensi/store', [PresensiController::class, 'store'])->name('presensi.store');
Route::resource('presensimasuk', PresensimasukController::class)->middleware('auth');

Route::resource('spd', SPDController::class)->middleware('auth');
Route::get('showpegawais', [PegawaiController::class, 'showpegawai'])->name('showpegawais');
Route::get('pegawai/importpegawai', [PegawaiController::class, 'importpegawai'])->name('pegawai.importpegawai')->middleware('auth');
Route::get('cthpegawai', [PegawaiController::class, 'cthpegawai']);
Route::resource('pegawai', PegawaiController::class)->middleware('auth');
Route::post('pegawai/prosesimportuser', [PegawaiController::class, 'prosesimportpegawai'])->name('pegawai.prosesimportpegawai')->middleware('auth');


Route::get('spd2',[SPDController::class, 'index2']);
Route::get('spd3',[SPDController::class, 'index3']);
Route::get('spd4',[SPDController::class, 'index4']);
Route::get('spd6',[SPDController::class, 'index6']);

Route::resource('perusahaan', PerusahaanController::class)->middleware('auth');
Route::resource('testing', TestingController::class);

Route::get('radius', [PresensiController::class, 'radiuscheck']);

Route::get('geo', [PresensiController::class, 'geo']);
Route::get('maps', [PresensiController::class, 'maps']);