<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\RegistrasiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegistrasiController::class, 'index']);
Route::post('/register', [RegistrasiController::class, 'store']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/kuesioner', [KuesionerController::class, 'index']);
    Route::resource('/kuesioner', KuesionerController::class);
    Route::resource('/account', AccountController::class)->except('show');

    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/pegawai/{id}', [PegawaiController::class, 'tambah']);
    Route::resource('/pegawai', PegawaiController::class);

    Route::resource('/pemohon', PemohonController::class);
    Route::get('/pemohon', [PemohonController::class, 'index']);
    Route::get('/pemohon/{id}', [PemohonController::class, 'detail'])->name('detailpemohon');

    Route::get('/pinjaman', [PinjamanController::class, 'index']);
    Route::get('/pinjaman/tambah/{id}', [PinjamanController::class, 'tambah']);
    Route::resource('/pinjaman', PinjamanController::class);
    Route::get('/pinjamanperiode/{id}', [PinjamanController::class, 'pinjaman'])->name('pinjaman');
    Route::get('/pdf/{id}', [PinjamanController::class, 'cetak']);
    Route::get('/pinjaman/{id}', [PinjamanController::class, 'detail']);
});
Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/periode', [PeriodeController::class, 'index']);
    Route::resource('/periode', PeriodeController::class);


    // Route::get('/kriteria', [KriteriaController::class, 'index']);
    Route::get('/kriteria/update', [KriteriaController::class, 'ubah']);
    Route::resource('/kriteria', KriteriaController::class);

    Route::get('/nilaidetail/{id}', [NilaiController::class, 'detail'])->name('nilaidetail');
    Route::get('/nilai/make/{id}', [NilaiController::class, 'make']);
    Route::resource('/nilai', NilaiController::class);

    Route::get('/alternatif', [AlternatifController::class, 'index']);
    Route::get('/alternatif/periode/{id}', [AlternatifController::class, 'alternatif'])->name('alternatif');
    Route::get('/alternatif/tambah/{id}', [AlternatifController::class, 'tambah']);
    Route::delete('/alternatif/{PemId}/{PeriodId}', [AlternatifController::class, 'delete']);
    Route::get('/alternatif/loaddata', [AlternatifController::class, 'loadData']);
    Route::resource('/alternatif', AlternatifController::class);


    Route::get('/hasil', [HasilController::class, 'index']);
    Route::get('/hasil/detail/{periode}/{id}', [HasilController::class, 'detail']);
    Route::get('/hasil/{id}', [HasilController::class, 'hasil']);
    Route::get('/cetak/{id}', [HasilController::class, 'cetak']);
});
