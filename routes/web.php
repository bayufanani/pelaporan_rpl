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
	Route::post('/verifikasi', 'Admin@Verifikasi');
	Route::post('/laporan/{id}/hapus', 'Admin@HapusLaporan');
	Route::get('/logout', 'Admin@Logout');
});

Route::get('/api/data-pelaporan', 'Api@DataPelaporan');