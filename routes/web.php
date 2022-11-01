<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LuaranController;
use App\Http\Controllers\Admin\RolesPermissions\RolesController;
use App\Http\Controllers\Admin\Setting\SettingDeadlineController;
use App\Http\Controllers\Admin\SisterData\PenelitianSisterController;
use App\Http\Controllers\Admin\SisterData\PengabdianSisterController;
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
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storev2'])->name('do-register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.token'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    Route::get('roles/get-all', [\App\Http\Controllers\Admin\RolesPermissions\RolesController::class, 'getAll'])->name('roles.get-all');
    Route::resource('roles', RolesController::class);

    Route::group(['prefix' => 'penelitian', 'as' => 'penelitian.'], function () {
        Route::get('/tambah-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'tambahDataPenelitian'])->name('tambah-penelitian');
        Route::get('/edit-penelitian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'editDataPenelitian'])->name('edit-penelitian');
        Route::post('/simpan-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'simpanDataPenelitian'])->name('simpan-penelitian');
        Route::post('/update-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'updateDataPenelitian'])->name('update-penelitian');
        Route::get('/data-penelitian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'dataPenelitian'])->name('data-penelitian');
        Route::get('/detail-penelitian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'detailPenelitian'])->name('detail-penelitian');
        Route::get('/update-status-penelitian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'updateStatusPenelitian'])->name('update-status-penelitian');
        Route::get('/get-all', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getAll'])->name('get-all');
        Route::get('/get-penelitian-by-reviwer-datatables/{userId}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getPenelitianByReviewerDatatables'])->name('get-penelitian-by-reviwer-datatables');
        Route::get('/get-penelitian-cascader/{tahunUsulan}/{tahunPelaksanaan}/{fakultas}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getPenelitianCascader'])->name('get-penelitian-cascader');
        Route::post('/upload-pengesahan', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadPengesahan'])->name('upload-pengesahan');
        Route::post('/upload-proposal', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadProposal'])->name('upload-proposal');
        Route::post('/upload-proposal-revisi', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadProposalRevisi'])->name('upload-proposal-revisi');
        Route::post('/upload-laporan-akhir', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadLaporanAkhir'])->name('upload-laporan-akhir');
        Route::post('/upload-laporan-70', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadLaporan70'])->name('upload-laporan-70');
        Route::post('/upload-kepuasan-mitra', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'uploadKepuasanMitra'])->name('upload-kepuasan-mitra');
        Route::post('/tambah-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'tambahCatatanHarian'])->name('tambah-catatan-harian');
        Route::post('/edit-catatan-harian', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'editCatatanHarian'])->name('edit-catatan-harian');
        Route::get('/get-catatan-harian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getCatatanHarian'])->name('get-catatan-harian');
        Route::get('/hapus-catatan-harian/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'hapusCatatanHarian'])->name('hapus-catatan-harian');

        Route::get('/reviewer', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'reviewer'])->name('reviewer');
        Route::get('/get-user-reviewer-filter-datatables', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'getUserReviewerFilterDatatables'])->name('get-user-reviewer-filter-datatables');
        Route::get('/reviewer-detail/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'reviewerDetail'])->name('reviewer-detail');
        Route::get('/penugasan-reviewer/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'penugasanReviewer'])->name('penugasan-reviewer');
        Route::post('/create-penugasan-reviewer/{id}', [\App\Http\Controllers\Admin\Penelitian\PenelitianController::class, 'createPenugasanReviewer'])->name('create-penugasan-reviewer');
    });


    Route::group(['prefix' => 'pengabdian', 'as' => 'pengabdian.'], function () {
        Route::get('/tambah-pengabdian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'tambahDataPengabdian'])->name('tambah-pengabdian');
        Route::get('/edit-pengabdian/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'editDataPengabdian'])->name('edit-pengabdian');
        Route::post('/simpan-pengabdian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'simpanDataPengabdian'])->name('simpan-pengabdian');
        Route::post('/update-pengabdian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'updateDataPengabdian'])->name('update-pengabdian');
        Route::get('/data-pengabdian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'dataPengabdian'])->name('data-pengabdian');
        Route::get('/detail-pengabdian/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'detailPengabdian'])->name('detail-pengabdian');
        Route::get('/update-status-pengabdian/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'updateStatusPengabdian'])->name('update-status-pengabdian');
        Route::get('/get-all', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'getAll'])->name('get-all');
        Route::get('/get-pengabdian-by-reviwer-datatables/{userId}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'getPengabdianByReviewerDatatables'])->name('get-pengabdian-by-reviwer-datatables');
        Route::get('/get-pengabdian-cascader/{tahunUsulan}/{tahunPelaksanaan}/{fakultas}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'getPengabdianCascader'])->name('get-pengabdian-cascader');
        Route::post('/upload-pengesahan', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadPengesahan'])->name('upload-pengesahan');
        Route::post('/upload-proposal', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadProposal'])->name('upload-proposal');
        Route::post('/upload-proposal-revisi', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadProposalRevisi'])->name('upload-proposal-revisi');
        Route::post('/upload-laporan-akhir', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadLaporanAkhir'])->name('upload-laporan-akhir');
        Route::post('/upload-laporan-70', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadLaporan70'])->name('upload-laporan-70');
        Route::post('/upload-kepuasan-mitra', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'uploadKepuasanMitra'])->name('upload-kepuasan-mitra');
        Route::post('/tambah-catatan-harian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'tambahCatatanHarian'])->name('tambah-catatan-harian');
        Route::post('/edit-catatan-harian', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'editCatatanHarian'])->name('edit-catatan-harian');
        Route::get('/get-catatan-harian/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'getCatatanHarian'])->name('get-catatan-harian');
        Route::get('/hapus-catatan-harian/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'hapusCatatanHarian'])->name('hapus-catatan-harian');

        Route::get('/tambah-laporan-akhir', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'tambahLaporanAkhir'])->name('tambah-laporan-akhir');
        Route::get('/data-laporan-akhir', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'dataLaporanAkhir'])->name('data-laporan-akhir');

        Route::get('/reviewer', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'reviewer'])->name('reviewer');
        Route::get('/get-user-reviewer-filter-datatables', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'getUserReviewerFilterDatatables'])->name('get-user-reviewer-filter-datatables');
        Route::get('/reviewer-detail/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'reviewerDetail'])->name('reviewer-detail');
        Route::get('/penugasan-reviewer/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'penugasanReviewer'])->name('penugasan-reviewer');
        Route::post('/create-penugasan-reviewer/{id}', [\App\Http\Controllers\Admin\Pengabdian\PengabdianController::class, 'createPenugasanReviewer'])->name('create-penugasan-reviewer');
    });

    Route::group(['prefix' => 'manage-user', 'as' => 'manage-user.'], function () {
        Route::get('/list', [UserManagementController::class, 'index'])->name('list');
        Route::get('/get-all', [UserManagementController::class, 'getAll'])->name('get-all');
        Route::get('/get-user/{id}', [UserManagementController::class, 'getUser'])->name('get-user');
        Route::get('/delete/{id}', [UserManagementController::class, 'destroy'])->name('delete');
        Route::post('/create', [UserManagementController::class, 'store'])->name('create');
        Route::post('/update', [UserManagementController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'luaran', 'as' => 'luaran.'], function () {
        Route::put('/update/{id}', [LuaranController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'sister', 'as' => 'sister.'], function () {
        Route::get('/daftar-penelitian', [PenelitianSisterController::class, 'index'])->name('daftar-penelitian');
        Route::post('/daftar-penelitian-filter', [PenelitianSisterController::class, 'filter'])->name('daftar-penelitian-filter');

        Route::get('/daftar-pengabdian', [PengabdianSisterController::class, 'index'])->name('daftar-pengabdian');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/deadline', [SettingDeadlineController::class, 'index'])->name('deadline.index');
        Route::post('/deadline', [SettingDeadlineController::class, 'store'])->name('deadline.store');
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
