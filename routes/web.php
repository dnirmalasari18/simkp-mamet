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

Route::get('login', function(){
    return view('auth.login');
})->name('login');
Route::post('login', 'UserController@login')->name('login');

Route::get('register', function(){
    return view('auth.register');
});
Route::post('register', 'UserController@register')->name('register');

Route::prefix('corps/')->group(function(){
    Route::get('{id}','CorpController@show')->name('corp.show');
    Route::get('{id}/note/create','CorpController@create')->name('corp.create');
    Route::post('{id}/note/create','CorpController@store')->name('corp.store');
    Route::post('{id}/note/delete','CorpController@delete')->name('corp.delete');
});

Route::prefix('users/')->group(function(){
    Route::get('','UserController@index')->name('user.index');
    Route::get('create','UserController@create')->name('user.create');
    Route::post('create','UserController@store')->name('user.create');    
    Route::post('delete','UserController@delete')->name('user.delete');
    Route::get('{id}','UserController@show')->name('user.show');    
    Route::get('{id}/edit','UserController@edit')->name('user.edit');
    Route::post('{id}/edit','UserController@update')->name('user.edit');
});

Route::prefix('news/')->group(function(){
    Route::get('','NewsController@index')->name('news.index');    
    Route::get('create','NewsController@create')->name('news.create');
    Route::post('create','NewsController@store')->name('news.create');    
    Route::post('delete','NewsController@delete')->name('news.delete');
    Route::get('{id}','NewsController@show')->name('news.show');
    Route::get('{id}/edit','NewsController@edit')->name('news.edit');
    Route::post('{id}/edit','NewsController@update')->name('news.edit');
});

Route::prefix('periods/')->group(function(){
    Route::get('','PeriodController@index')->name('period.index');    
    Route::get('create','PeriodController@create')->name('period.create');
    Route::post('create','PeriodController@store')->name('period.create');    
    Route::post('delete','PeriodController@delete')->name('period.delete');
    Route::post('activate','PeriodController@activate')->name('period.activate');
    Route::post('deactivate','PeriodController@deactivate')->name('period.deactivate');
    Route::get('{id}','PeriodController@show')->name('period.show');
    Route::get('{id}/edit','PeriodController@edit')->name('period.edit');
    Route::post('{id}/edit','PeriodController@update')->name('period.edit');
});

Route::prefix('lecturers/')->group(function(){
    Route::get('','LecturerController@index')->name('lecutrer.index');    
    Route::get('assign','LecturerController@assign')->name('lecutrer.assign');
    Route::post('unassign','LecturerController@unassign')->name('lecutrer.unassign');    
    Route::get('{id}','LecturerController@show')->name('lecutrer.show');
});

Route::prefix('groups/')->group(function(){
    Route::get('','GroupController@index')->name('group.index');    
    Route::get('create','GroupController@create')->name('group.create');
    Route::post('create','GroupController@store')->name('group.create');    
    Route::post('delete','GroupController@delete')->name('group.delete');
    Route::get('{id}','GroupController@show')->name('group.show');
    Route::get('{id}/edit','GroupController@edit')->name('group.edit');
    Route::post('{id}/edit','GroupController@update')->name('group.edit');

    Route::get('{id}/proof','ProofController@show')->name('proof.show');
    Route::post('{id}/proof/create','ProofController@create')->name('proof.create');
    Route::post('{id}/proof/delete','ProofController@delete')->name('proof.delete');

    Route::post('{id}/accept','GroupController@accept')->name('group.accept');
    Route::post('{id}/decline','GroupController@decline')->name('group.decline');

    Route::get('{id}/reports','ReportController@show')->name('report.show');
    Route::get('{id}/reports/create','ReportController@create')->name('report.create');
    Route::post('{id}/reports/create','ReportController@store')->name('report.create');
    Route::post('{id}/reports/delete','ReportController@delete')->name('report.delete');

    Route::post('{id}/status/request','StatusController@request')->name('status.request');
    Route::post('{id}/status/accept','StatusController@accept')->name('status.accept');
    Route::post('{id}/status/decline','StatusController@decline')->name('status.decline');
    Route::post('{id}/status/finish','StatusController@finish')->name('status.finish');
});

Route::get('statistics/periods/{id}','StatisticController@period')->name('statistic.period');
Route::get('statistics/corps/{id}','StatisticController@corp')->name('statistic.corp');

Route::get('valuation/periods/{id}','ValuationController@edit')->name('statistic.edit');
Route::post('valuation/periods/{id}','ValuationController@store')->name('statistic.edit');

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
