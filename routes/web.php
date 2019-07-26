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
Route::get('logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('reset','UserController@reset')->name('reset');
Route::post('reset','UserController@doReset')->name('password.update');

Route::prefix('corps/')->group(function(){
    Route::get('{id}','CorpController@show')->name('corp.show')->middleware('koordinator');
    Route::post('note/create','CorpController@noteStore')->name('corp.note.create')->middleware('koordinator');
    Route::post('note/delete','CorpController@noteDelete')->name('corp.note.delete')->middleware('koordinator');
});

Route::prefix('cover_letter/')->group(function(){
    Route::get('','CoverLetterController@index')->name('cover_letter.index')->middleware('tu');
    Route::post('','CoverLetterController@download')->name('cover_letter.download')->middleware('tu');
});

Route::prefix('users/')->group(function(){
    Route::get('','UserController@index')->name('user.index')->middleware('koordinator');
    Route::get('create','UserController@create')->name('user.create')->middleware('koordinator');
    Route::post('create','UserController@store')->name('user.create')->middleware('koordinator');
    Route::post('delete','UserController@destroy')->name('user.delete')->middleware('koordinator');
    Route::get('{id}','UserController@show')->name('user.show')->middleware('koordinator');
    Route::get('{id}/edit','UserController@edit')->name('user.edit')->middleware('koordinator');
    Route::post('edit','UserController@update')->name('user.edit')->middleware('koordinator');
});

Route::prefix('news/')->group(function(){
    Route::get('','NewsController@index')->name('news.index');        
    Route::get('create','NewsController@create')->name('news.create')->middleware('koordinator');
    Route::post('create','NewsController@store')->name('news.create')->middleware('koordinator');
    Route::post('delete','NewsController@destroy')->name('news.delete')->middleware('koordinator');
    Route::get('{id}','NewsController@show')->name('news.show')->middleware('koordinator');
    Route::get('{id}/edit','NewsController@edit')->name('news.edit')->middleware('koordinator');
    Route::post('{id}/edit','NewsController@update')->name('news.edit')->middleware('koordinator');    
});

Route::prefix('periods/')->group(function(){
    Route::get('','PeriodController@index')->name('period.index')->middleware('koordinator');
    Route::get('create','PeriodController@create')->name('period.create')->middleware('koordinator');
    Route::post('create','PeriodController@store')->name('period.create')->middleware('koordinator');
    Route::post('delete','PeriodController@destroy')->name('period.delete')->middleware('koordinator');
    Route::post('activate','PeriodController@activate')->name('period.activate')->middleware('koordinator');
    Route::post('deactivate','PeriodController@deactivate')->name('period.deactivate')->middleware('koordinator');
    Route::get('{id}','PeriodController@show')->name('period.show')->middleware('koordinator');
    Route::post('edit','PeriodController@update')->name('period.edit')->middleware('koordinator');
});

Route::prefix('lecturers/')->group(function(){
    Route::get('','LecturerController@index')->name('lecturer.index')->middleware('dosen');
    Route::post('assign','LecturerController@assign')->name('lecturer.assign')->middleware('dosen');
    Route::post('unassign','LecturerController@unassign')->name('lecturer.unassign')->middleware('dosen');
    Route::get('{id}','LecturerController@show')->name('lecturer.show')->middleware('dosen');
    Route::post('group/assign','LecturerController@assignGroup')->name('lecturer.group.assign')->middleware('dosen');
    Route::post('group/accept','LecturerController@acceptGroup')->name('lecturer.group.accept')->middleware('dosen');
    Route::post('group/decline','LecturerController@declineGroup')->name('lecturer.group.decline')->middleware('dosen');
    Route::post('log/accept','LecturerController@acceptLog')->name('lecturer.log.accept')->middleware('dosen');
});

Route::prefix('groups/')->group(function(){
    Route::get('','GroupController@index')->name('group.index')->middleware('auth');
    Route::get('create','GroupController@create')->name('group.create')->middleware('auth');
    Route::post('create','GroupController@store')->name('group.create')->middleware('auth');
    Route::post('delete','GroupController@destroy')->name('group.delete')->middleware('auth');
    Route::get('{id}','GroupController@show')->name('group.show')->middleware('auth');
    Route::get('{id}/edit','GroupController@edit')->name('group.edit')->middleware('auth');
    Route::post('{id}/edit','GroupController@update')->name('group.edit')->middleware('auth');

    Route::get('{id}/proof','ProofController@show')->name('proof.show')->middleware('auth');
    Route::post('proof/create','ProofController@store')->name('proof.create')->middleware('auth');
    Route::post('proof/delete','ProofController@delete')->name('proof.delete')->middleware('auth');

    Route::post('accept','GroupController@accept')->name('group.accept')->middleware('auth');
    Route::post('decline','GroupController@decline')->name('group.decline')->middleware('auth');

    Route::get('reports/create','ReportController@create')->name('report.create')->middleware('auth');
    Route::post('reports/create','ReportController@store')->name('report.create')->middleware('auth');
    Route::post('reports/delete','ReportController@delete')->name('report.delete')->middleware('auth');

    Route::post('status/update','GroupController@statusUpdate')->name('status.update')->middleware('auth');

    Route::post('abstract/update','GroupController@abstractUpdate')->name('abstract.update')->middleware('auth');
});

Route::prefix('ajax/')->group(function(){
    Route::prefix('get/')->group(function(){
        Route::post('corp','AjaxController@getCorp')->name('ajax.corp');
        Route::post('student','AjaxController@getStudent')->name('ajax.student');
        Route::post('statistic', 'AjaxController@getStatistic')->name('ajax.statistic');
        Route::get('statistic', 'AjaxController@getStatisticC')->name('ajax.statistic');
        Route::post('period/students', 'AjaxController@getPeriodStudent')->name('ajax.period.student');
        Route::get('period/students', 'AjaxController@getPeriodStudentC')->name('ajax.period.student');
    });
});

Route::get('statistics','StatisticController@show')->name('statistic.show')->middleware('koordinator');

Route::get('valuation/communals', 'ValuationController@communal')->name('valuation.communal')->middleware('dosen');
Route::get('valuation/communals/edit','ValuationController@editCommunal')->name('valuation.communal.edit')->middleware('dosen');
Route::post('valuation/group/store', 'ValuationController@store')->name('valuation.store')->middleware('dosen');    

Route::get('/', function () {
    return redirect('login');
});

Route::get('/nilai',function(){
    return view('mockup.coba-nilai-integra');
});

Route::get('/nilai/edit',function(){
    return view('mockup.coba-nilai-integra-edit');
})->name('nilai.edit');


Route::get('storage/{foldername}/{filename}', 'StorageController@getFile');
// Route::get('storage/{foldername}/{filename}', function ($foldername, $filename)
// {        
//     $path = storage_path('app/'.$foldername.'/'.$filename);

//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);


//     $response->header("Content-Type", $type)->header('Content-disposition','attachment; filename="test"');

//     return $response;
// });
