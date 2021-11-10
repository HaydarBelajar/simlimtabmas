<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserManagementController;

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
    return redirect('/dashboard/home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.token'])->group(function () {
    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function() {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });


    Route::group(['prefix'=>'penelitian','as'=>'penelitian.'], function() {
        Route::get('/tambah-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'tambahDataPenelitian'])->name('tambah-penelitian');
        Route::post('/simpan-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'simpanDataPenelitian'])->name('simpan-penelitian');
        Route::get('/data-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'dataPenelitian'])->name('data-penelitian');
        Route::get('/detail-penelitian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'detailPenelitian'])->name('detail-penelitian');
        Route::get('/get-all', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getAll'])->name('get-all');
        Route::post('/upload-pengesahan', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadPengesahan'])->name('upload-pengesahan');
        Route::post('/upload-proposal', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadProposal'])->name('upload-proposal');
        Route::post('/upload-laporan-akhir', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadLaporanAkhir'])->name('upload-laporan-akhir');
        Route::post('/tambah-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'tambahCatatanHarian'])->name('tambah-catatan-harian');
        Route::post('/edit-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'editCatatanHarian'])->name('edit-catatan-harian');
        Route::get('/get-catatan-harian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getCatatanHarian'])->name('get-catatan-harian');
        Route::get('/hapus-catatan-harian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'hapusCatatanHarian'])->name('hapus-catatan-harian');

        Route::get('/catatan-harian/{id}', [\App\Http\Controllers\Admin\Penelitian\CatatanHarianController::class, 'catatanHarian'])->name('catatan-harian');
        Route::get('/tambah-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\CatatanHarianController::class, 'tambahDataCatatanHarian'])->name('tambah-catatan-harian');
        Route::get('/data-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\CatatanHarianController::class, 'dataCatatanHarian'])->name('data-catatan-harian');

        Route::get('/tambah-laporan-akhir', [\App\Http\Controllers\Admin\Penelitian\LaporanAkhirController::class, 'tambahLaporanAkhir'])->name('tambah-laporan-akhir');
        Route::get('/data-laporan-akhir', [\App\Http\Controllers\Admin\Penelitian\LaporanAkhirController::class, 'dataLaporanAkhir'])->name('data-laporan-akhir');
    });

    Route::group(['prefix'=>'manage-user','as'=>'manage-user.'], function() {
        Route::get('/list', [UserManagementController::class, 'index'])->name('list');
        Route::get('/get-all', [UserManagementController::class, 'getAll'])->name('get-all');
        Route::get('/get-user/{id}', [UserManagementController::class, 'getUser'])->name('get-user');
        Route::get('/delete/{id}', [UserManagementController::class, 'destroy'])->name('delete');
        Route::post('/create', [UserManagementController::class, 'store'])->name('create');
        Route::post('/update', [UserManagementController::class, 'update'])->name('update');
    });

    Route::group(['prefix'=>'penelitian-usulan-baru','as'=>'penelitian-usulan-baru.'], function() {
        Route::get('/usulan-baru', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'index'])->name('index');
        Route::get('/lanjutkan-usulan-baru', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'lanjutkanUsulan'])->name('lanjutkan-usulan');
        Route::get('/identitas-usulan-baru', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'identitasUsulan'])->name('identitas-usulan');
        Route::get('/jurnal-internasional', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'jurnalInternasional'])->name('jurnal-internasional');
        Route::get('/jurnal-nasional', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'jurnalNasional'])->name('jurnal-nasional');
        Route::get('/artikel-prosiding', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'artikelProsiding'])->name('artikel-prosiding');
        Route::get('/kekayaan-intelektual', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'kekayaanIntelektual'])->name('kekayaan-intelektual');
        Route::get('/buku', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanBaruController::class, 'buku'])->name('buku');
    });

    Route::group(['prefix'=>'pengabdian','as'=>'pengabdian.'], function() {
        Route::get('/usulan-baru', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'index'])->name('index');
        Route::get('/lanjutkan-usulan-baru', [\App\Http\Controllers\Admin\Pengabdian\PengabdianUsulanBaruController::class, 'lanjutkanUsulan'])->name('lanjutkan-usulan');
    });

    Route::group(['prefix'=>'penelitian-usulan-lanjutan','as'=>'penelitian-usulan-lanjutan.'], function() {
        Route::get('/usulan-lanjutan', [\App\Http\Controllers\Admin\Penelitian\PenelitianUsulanLanjutanController::class, 'index'])->name('index');
    });

    Route::group(['prefix'=>'perbaikan-usulan','as'=>'perbaikan-usulan.'], function() {
        Route::get('/perbaikan-usulan', [\App\Http\Controllers\Admin\Penelitian\PerbaikanUsulanController::class, 'index'])->name('index');
    });

    Route::group(['prefix'=>'sptb','as'=>'sptb.'], function() {
        Route::get('/sptb', [\App\Http\Controllers\Admin\Penelitian\SPTBController::class, 'index'])->name('index');
    });

    Route::group(['prefix'=>'laporan-kemajuan','as'=>'laporan-kemajuan.'], function() {
        Route::get('/laporan-kemajuan', [\App\Http\Controllers\Admin\Penelitian\LaporanKemajuanController::class, 'index'])->name('index');
        Route::get('/laporan-kemajuan-edit', [\App\Http\Controllers\Admin\Penelitian\LaporanKemajuanController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix'=>'laporan-akhir','as'=>'laporan-akhir.'], function() {
        Route::get('/laporan-akhir', [\App\Http\Controllers\Admin\Penelitian\LaporanAkhirController::class, 'index'])->name('index');
        Route::get('/laporan-akhir-edit', [\App\Http\Controllers\Admin\Penelitian\LaporanAkhirController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix'=>'rekap-luaran','as'=>'rekap-luaran.'], function() {
        Route::get('/rekap-luaran', [\App\Http\Controllers\Admin\Penelitian\RekapLuaranController::class, 'index'])->name('index');
    });


    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
