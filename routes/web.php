<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
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
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin']);


Route::middleware(['auth', 'CekAdmin'])->group(function () {
    Route::get('/account-list', [AccountController::class, 'index']);
    Route::post('/account-list/add', [AccountController::class, 'postData']);
    Route::get('/account-list/list', [AccountController::class, 'apiListUser']);
    Route::get('/account-list/data/{id}', [AccountController::class, 'apiUser']);
    Route::get('/account-list/delete/{id}', [AccountController::class, 'deleteUser']);
    Route::post('/account-list/update/{id}', [AccountController::class, 'updateUser']);
    Route::get('/surat/delete/{id}', [PageController::class, 'deleteSurat']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.view');
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/tulis-dokumentasi', [DokumentasiController::class, 'index'])->name('tulisdokumentasi.view');
    Route::post('/tulis-dokumentasi', [DokumentasiController::class, 'post']);

    //Surat
    Route::get('/surat', [PageController::class, 'pageSurat']);
    Route::get('/surat/data/{id}', [PageController::class, 'apiSurat'])->name('api.surat');
    Route::get('/surat/list', [PageController::class, 'getDataSurat'])->name('list.surat');

    //RAB
    Route::get('/RAB', [PageController::class, 'pageRAB']);
    Route::get('/RAB/list', [PageController::class, 'getDataRAB']);

    //BoM
    Route::get('/BoM', [PageController::class, 'pageBoM']);
    Route::get('/BoM/list', [PageController::class, 'getDataBoM']);

    //SPK
    Route::get('/SPK', [PageController::class, 'pageSPK']);
    Route::get('/SPK/list', [PageController::class, 'getDataSPK']);

    //Dokumentasi
    Route::get('/Documents', [PageController::class, 'pageDoc']);
    Route::get('/Documents/list', [PageController::class, 'getDataDoc']);
});
