<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/profil', function () {
//     return view('profil');
// });

Route::get('/tim', function () {
    return view('tim');
});

// Route::get('/jadwal', function () {
//     return view('jadwal');
// });

// Route::get('/layanan', function () {
//     return view('layanan');
// });

// Route::get('/layanan-sertifikasi', function () {
//     return view('pelayanan-cert');
// });

// Route::get('/layanan-nonsertifikasi', function () {
//     return view('pelayanan-noncert');
// });

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/', [HomeController::class, 'index', TimetableController::class, 'openPdf'])->name('index');
Route::get('profil', [ProfileController::class, 'index'])->name('profil');
Route::get('layanan', [CertificationController::class, 'layanan'])->name('layanan');
Route::get('layanan-sertifikasi', [CertificationController::class, 'layananSertifikasi'])->name('layanan.sertifikasi');
Route::get('layanan-nonsertifikasi', [CertificationController::class, 'layananNonSertifikasi'])->name('layanan.nonsertifikasi');
Route::get('certification/{id}', [CertificationController::class, 'detail'])->name('certification.detail');
Route::get('jadwal', [TrainingController::class, 'index'])->name('jadwal.pelatihan');
Route::get('brosur', [BrochureController::class, 'index'])->name('brochure');
Route::get('galeri', [ActivityController::class, 'index'])->name('galeri');
Route::get('pendaftaran', [RegistrationController::class, 'index'])->name('registration');
Route::post('pendaftaran/submit', [RegistrationController::class, 'submit'])->name('registration.submit');
