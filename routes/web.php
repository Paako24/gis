<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('home', [HomeController::class, 'home'])->name('home');

Route::get('surabaya-rs', [HomeController::class, 'surabayaRs'])->name('surabaya.rs');
Route::get('surabaya-puskesmas', [HomeController::class, 'surabayaPuskesmas'])->name('surabaya.puskesmas');
Route::get('surabaya-apotek', [HomeController::class, 'surabayaApotek'])->name('surabaya.apotek');

Route::get('sidoarjo-rs', [HomeController::class, 'sidoarjoRs'])->name('sidoarjo.rs');
Route::get('sidoarjo-puskesmas', [HomeController::class, 'sidoarjoPuskesmas'])->name('sidoarjo.puskesmas');
Route::get('sidoarjo-apotek', [HomeController::class, 'sidoarjoApotek'])->name('sidoarjo.apotek');

Route::get('gresik-rs', [HomeController::class, 'gresikRs'])->name('gresik.rs');
Route::get('gresik-puskesmas', [HomeController::class, 'gresikPuskesmas'])->name('gresik.puskesmas');
Route::get('gresik-apotek', [HomeController::class, 'gresikApotek'])->name('gresik.apotek');
