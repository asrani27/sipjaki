<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MerkOliController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\JenisOliController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SerahTerimaController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\GantiPasswordController;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('lupa-password', [LupaPasswordController::class, 'index']);
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/', [FrontController::class, 'beranda']);
Route::get('/profil/struktur', [FrontController::class, 'struktur']);
Route::get('/profil/renstra', [FrontController::class, 'renstra']);
Route::get('/profil/tupoksi', [FrontController::class, 'tupoksi']);
Route::get('/berita/berita', [FrontController::class, 'berita']);
Route::get('/berita/{id}/{slug}', [FrontController::class, 'detailBerita']);
Route::get('/berita/agenda', [FrontController::class, 'agenda']);
Route::get('/pelatihan/pelatihan', [FrontController::class, 'pelatihan']);
Route::get('/pelatihan/sertifikasi', [FrontController::class, 'sertifikasi']);
Route::get('/pelatihan/bimtek', [FrontController::class, 'bimtek']);

Route::get('/pengawasan/tertib-usaha', [FrontController::class, 'usaha']);
Route::get('/pengawasan/tertib-penyelenggaraan', [FrontController::class, 'penyelenggaraan']);
Route::get('/pengawasan/tertib-pemanfaatan', [FrontController::class, 'pemanfaatan']);

Route::get('/informasi/iujk', [FrontController::class, 'iujk']);
Route::get('/informasi/tdup', [FrontController::class, 'tdup']);
Route::get('/informasi/bu', [FrontController::class, 'bu']);
Route::get('/informasi/timpembina', [FrontController::class, 'timpembina']);
Route::get('/datajakon/standarbiaya', [FrontController::class, 'standarbiaya']);
Route::get('/datajakon/progresspaket', [FrontController::class, 'progresspaket']);
Route::get('/tenagakerja/skaskt', [FrontController::class, 'skaskt']);
Route::get('/tenagakerja/pjt', [FrontController::class, 'pjt']);
Route::get('/spm/informasi', [FrontController::class, 'informasi']);
Route::get('/spm/laporan', [FrontController::class, 'laporan']);
Route::get('/peraturan/undangundang', [FrontController::class, 'undangundang']);
Route::get('/peraturan/pp', [FrontController::class, 'pp']);
Route::get('/peraturan/perpres', [FrontController::class, 'perpres']);
Route::get('/peraturan/permen', [FrontController::class, 'permen']);
Route::get('/peraturan/kepmen', [FrontController::class, 'kepmen']);
Route::get('/peraturan/edaran', [FrontController::class, 'edaran']);
Route::get('/peraturan/referensi', [FrontController::class, 'referensi']);
Route::get('/peraturan/perda', [FrontController::class, 'perda']);
Route::get('/peraturan/pergub', [FrontController::class, 'pergub']);
Route::get('/peraturan/perwali', [FrontController::class, 'perwali']);
Route::get('/peraturan/sk', [FrontController::class, 'sk']);
Route::get('/forum', [FrontController::class, 'forum']);
Route::get('/forum/{id}/{slug}', [FrontController::class, 'detailForum']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin/beranda', [HomeController::class, 'superadmin']);
    Route::get('superadmin/gantipass', [GantiPasswordController::class, 'index']);
    Route::post('superadmin/gantipass', [GantiPasswordController::class, 'update']);

    Route::get('superadmin/profil/struktur', [ProfilController::class, 'struktur']);
    Route::post('superadmin/profil/struktur', [ProfilController::class, 'update_struktur']);
    Route::get('superadmin/profil/renstra', [ProfilController::class, 'renstra']);
    Route::post('superadmin/profil/renstra', [ProfilController::class, 'update_renstra']);
    Route::get('superadmin/profil/tupoksi', [ProfilController::class, 'tupoksi']);
    Route::post('superadmin/profil/tupoksi', [ProfilController::class, 'update_tupoksi']);

    Route::get('superadmin/header', [SettingController::class, 'header']);
    Route::post('superadmin/header', [SettingController::class, 'updateHeader']);

    Route::get('superadmin/slideshow', [SettingController::class, 'slideshow']);
    Route::post('superadmin/slide1', [SettingController::class, 'updateSlide1']);
    Route::post('superadmin/slide2', [SettingController::class, 'updateSlide2']);
    Route::post('superadmin/slide3', [SettingController::class, 'updateSlide3']);

    Route::get('superadmin/berita', [BeritaController::class, 'index']);
    Route::get('superadmin/berita/create', [BeritaController::class, 'create']);
    Route::post('superadmin/berita/create', [BeritaController::class, 'store']);
    Route::get('superadmin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::post('superadmin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::get('superadmin/berita/delete/{id}', [BeritaController::class, 'delete']);


    Route::get('superadmin/peraturan', [PeraturanController::class, 'index']);
    Route::get('superadmin/peraturan/create', [PeraturanController::class, 'create']);
    Route::post('superadmin/peraturan/create', [PeraturanController::class, 'store']);
    Route::get('superadmin/peraturan/edit/{id}', [PeraturanController::class, 'edit']);
    Route::post('superadmin/peraturan/edit/{id}', [PeraturanController::class, 'update']);
    Route::get('superadmin/peraturan/delete/{id}', [PeraturanController::class, 'delete']);

    Route::get('superadmin/agenda', [AgendaController::class, 'index']);
    Route::get('superadmin/agenda/create', [AgendaController::class, 'create']);
    Route::post('superadmin/agenda/create', [AgendaController::class, 'store']);
    Route::get('superadmin/agenda/edit/{id}', [AgendaController::class, 'edit']);
    Route::post('superadmin/agenda/edit/{id}', [AgendaController::class, 'update']);
    Route::get('superadmin/agenda/delete/{id}', [AgendaController::class, 'delete']);

    Route::get('superadmin/pengumuman', [PengumumanController::class, 'index']);
    Route::get('superadmin/pengumuman/create', [PengumumanController::class, 'create']);
    Route::post('superadmin/pengumuman/create', [PengumumanController::class, 'store']);
    Route::get('superadmin/pengumuman/edit/{id}', [PengumumanController::class, 'edit']);
    Route::post('superadmin/pengumuman/edit/{id}', [PengumumanController::class, 'update']);
    Route::get('superadmin/pengumuman/delete/{id}', [PengumumanController::class, 'delete']);

    Route::get('superadmin/forum', [ForumController::class, 'index']);
    Route::get('superadmin/forum/create', [ForumController::class, 'create']);
    Route::post('superadmin/forum/create', [ForumController::class, 'store']);
    Route::get('superadmin/forum/edit/{id}', [ForumController::class, 'edit']);
    Route::post('superadmin/forum/edit/{id}', [ForumController::class, 'update']);
    Route::get('superadmin/forum/delete/{id}', [ForumController::class, 'delete']);

    Route::get('superadmin/jenislayanan', [JenisLayananController::class, 'index']);
    Route::get('superadmin/jenislayanan/create', [JenisLayananController::class, 'create']);
    Route::post('superadmin/jenislayanan/create', [JenisLayananController::class, 'store']);
    Route::get('superadmin/jenislayanan/edit/{id}', [JenisLayananController::class, 'edit']);
    Route::post('superadmin/jenislayanan/edit/{id}', [JenisLayananController::class, 'update']);
    Route::get('superadmin/jenislayanan/delete/{id}', [JenisLayananController::class, 'delete']);

    Route::get('superadmin/potensipasar', [PotensiController::class, 'index']);
    Route::get('superadmin/potensipasar/create', [PotensiController::class, 'create']);
    Route::post('superadmin/potensipasar/create', [PotensiController::class, 'store']);
    Route::get('superadmin/potensipasar/edit/{id}', [PotensiController::class, 'edit']);
    Route::post('superadmin/potensipasar/edit/{id}', [PotensiController::class, 'update']);
    Route::get('superadmin/potensipasar/delete/{id}', [PotensiController::class, 'delete']);

    Route::get('superadmin/pelatihan/pelatihan', [PelatihanController::class, 'index']);
    Route::get('superadmin/pelatihan/pelatihan/create', [PelatihanController::class, 'create']);
    Route::post('superadmin/pelatihan/pelatihan/create', [PelatihanController::class, 'store']);
    Route::get('superadmin/pelatihan/pelatihan/edit/{id}', [PelatihanController::class, 'edit']);
    Route::post('superadmin/pelatihan/pelatihan/edit/{id}', [PelatihanController::class, 'update']);
    Route::get('superadmin/pelatihan/pelatihan/delete/{id}', [PelatihanController::class, 'delete']);

    Route::get('superadmin/penjualan', [PenjualanController::class, 'index']);
    Route::get('superadmin/penjualan/create', [PenjualanController::class, 'create']);
    Route::post('superadmin/penjualan/create', [PenjualanController::class, 'store']);
    Route::get('superadmin/penjualan/edit/{id}', [PenjualanController::class, 'edit']);
    Route::get('superadmin/penjualan/transaksi/{id}', [PenjualanController::class, 'transaksi']);
    Route::get('superadmin/penjualan/kwitansi/{id}', [LaporanController::class, 'kuitansi']);
    Route::post('superadmin/penjualan/transaksi/{id}', [PenjualanController::class, 'transaksiStore']);
    Route::post('superadmin/penjualan/edit/{id}', [PenjualanController::class, 'update']);
    Route::get('superadmin/penjualan/delete/{id}', [PenjualanController::class, 'delete']);
    Route::get('superadmin/penjualan/deletetransaksi/{id}', [PenjualanController::class, 'transaksiDelete']);

    Route::get('superadmin/perhitungan', [PerhitunganController::class, 'index']);
    Route::get('superadmin/perhitungan/datalatih/create', [PerhitunganController::class, 'createDataLatih']);
    Route::get('superadmin/perhitungan/datauji/create', [PerhitunganController::class, 'createDataUji']);
    Route::get('superadmin/perhitungan/datalatih/edit/{id}', [PerhitunganController::class, 'editDataLatih']);
    Route::post('superadmin/perhitungan/datalatih/edit/{id}', [PerhitunganController::class, 'updateDataLatih']);
    Route::get('superadmin/perhitungan/datauji/edit/{id}', [PerhitunganController::class, 'editDataUji']);
    Route::post('superadmin/perhitungan/datauji/edit/{id}', [PerhitunganController::class, 'updateDataUji']);
    Route::get('superadmin/perhitungan/datauji/delete/{id}', [PerhitunganController::class, 'deleteDataUji']);
    Route::get('superadmin/perhitungan/datalatih/delete/{id}', [PerhitunganController::class, 'deleteDataLatih']);
    Route::post('superadmin/perhitungan/datalatih/create', [PerhitunganController::class, 'storeDataLatih']);
    Route::post('superadmin/perhitungan/datauji/create', [PerhitunganController::class, 'storeDataUji']);

    Route::get('superadmin/laporan', [LaporanController::class, 'index']);
    Route::get('superadmin/laporan/karyawan', [LaporanController::class, 'karyawan']);
    Route::get('superadmin/laporan/jenisoli', [LaporanController::class, 'jenisoli']);
    Route::get('superadmin/laporan/merkoli', [LaporanController::class, 'merkoli']);
    Route::get('superadmin/laporan/jenislayanan', [LaporanController::class, 'jenislayanan']);
    Route::get('superadmin/laporan/jabatan', [LaporanController::class, 'jabatan']);
    Route::post('superadmin/laporan/periode', [LaporanController::class, 'periode']);
});
