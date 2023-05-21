<?php

use App\Http\Livewire\DataPegawaiComponent;
use App\Http\Livewire\DataPresensiComponent;
use App\Http\Livewire\JamKerjaComponent;
use App\Http\Livewire\PegawaiComponent;
use App\Http\Livewire\RiwayatPresensiComponent;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/riwayat-presensi', RiwayatPresensiComponent::class)->name('riwayat-presensi');
Route::get('/data-pegawai', DataPegawaiComponent::class)->name('data-pegawai');
Route::get('/data-presensi', DataPresensiComponent::class)->name('data-presensi');
Route::get('/jam-kerja', JamKerjaComponent::class)->name('jam-kerja');
Route::get('/pegawai', PegawaiComponent::class)->name('pegawai');
