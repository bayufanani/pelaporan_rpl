<?php

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


Route::get('/login', 'Autentikasi@Login');
Route::post('/login', 'Autentikasi@DoLogin');

Route::middleware('cekauth')->group(function()
{
	Route::get('/', 'Admin@Home');
	Route::get('/laporan/{id}/verifikasi', 'Admin@Verifikasi');
	Route::get('/laporan/{id}/hapus', 'Admin@HapusLaporan');
  Route::get('/laporan/{id}/invalid', 'Admin@Invalid');
  Route::get('/logout', 'Admin@Logout');
});

Route::get('/api/data-pelaporan', 'Api@DataPelaporan');
Route::get('/api/data-pelaporan/{id}', 'Api@DataPelaporanById');
Route::get('/api/data-kecamatan', 'Api@DataKecamatan');
Route::get('/api/data-fasilitas', 'Api@DataFasilitas');

Route::get('/api/DetailModal/{id}', 'Api@DetailModal');
