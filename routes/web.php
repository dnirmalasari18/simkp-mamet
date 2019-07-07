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
Route::get('/berita', 'UserController@index');//function () {
    //return view('mockup.coba-berita');
// });
Route::get('/periode', function () {
    return view('mockup.coba-periode');
});
Route::get('/pengajuan', function () {
    return view('mockup.coba-pengajuan');
});
Route::get('/kp', function () {
    return view('mockup.coba-kp');
});
Route::get('/magang', function () {
    return view('mockup.coba-magang');
});
Route::get('/akundosbing', function () {
    return view('mockup.coba-akundosbing');
});
Route::get('/mahasiswa', function () {
    return view('mockup.coba-akunmahasiswa');
});

Route::get('/statistik', function () {
    return view('mockup.coba-statistik');
});
Route::get('/tes', function () {
    return view('mockup.test');
});

//not in sidebar
Route::get('/daftar', function () {
    return view('mockup.coba-daftar');
});
Route::get('/login', function () {
    return view('mockup.coba-login');
});