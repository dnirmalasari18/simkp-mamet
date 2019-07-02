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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/berita', function () {
    return view('mockup.coba-berita');
});
Route::get('/periode', function () {
    return view('mockup.coba-periode');
});
Route::get('/kelompok', function () {
    return view('mockup.coba-kelompok');
});
Route::get('/pengajuan', function () {
    return view('mockup.coba-pengajuan');
});
Route::get('/daftar', function () {
    return view('mockup.coba-daftar');
});
Route::get('/akun', function () {
    return view('mockup.coba-akun');
});
Route::get('/login', function () {
    return view('mockup.coba-login');
});
Route::get('/kelompok', function () {
    return view('mockup.coba-kelompok');
});
Route::get('/statistik', function () {
    return view('mockup.coba-statistik');
});