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

Route::prefix('corps/')->group(['middleware' => 'koordinator'],function(){
    Route::get('{id}','CorpController@show')->name('corp.show');
    Route::post('note/create','CorpController@noteStore')->name('corp.note.create');
    Route::post('note/delete','CorpController@noteDelete')->name('corp.note.delete');
});

Route::prefix('cover_letter/')->group(function(){
    Route::get('','CoverLetterController@index')->name('cover_letter.index');
    Route::post('','CoverLetterController@download')->name('cover_letter.download');
})->middleware('tu');

Route::prefix('users/')->group(function(){
    Route::get('','UserController@index')->name('user.index');
    Route::get('create','UserController@create')->name('user.create');
    Route::post('create','UserController@store')->name('user.create');
    Route::post('delete','UserController@destroy')->name('user.delete');
    Route::get('{id}','UserController@show')->name('user.show');
    Route::get('{id}/edit','UserController@edit')->name('user.edit');
    Route::post('edit','UserController@update')->name('user.edit');
})->middleware('koordinator');

Route::prefix('news/')->group(function(){
    Route::get('','NewsController@index')->name('news.index');
    
    Route::group(function(){
        Route::get('create','NewsController@create')->name('news.create');
        Route::post('create','NewsController@store')->name('news.create');
        Route::post('delete','NewsController@destroy')->name('news.delete');
        Route::get('{id}','NewsController@show')->name('news.show');
        Route::get('{id}/edit','NewsController@edit')->name('news.edit');
        Route::post('{id}/edit','NewsController@update')->name('news.edit');
    })->middleware('koordinator');
});

Route::prefix('periods/')->group(function(){
    Route::get('','PeriodController@index')->name('period.index');
    Route::get('create','PeriodController@create')->name('period.create');
    Route::post('create','PeriodController@store')->name('period.create');
    Route::post('delete','PeriodController@destroy')->name('period.delete');
    Route::post('activate','PeriodController@activate')->name('period.activate');
    Route::post('deactivate','PeriodController@deactivate')->name('period.deactivate');
    Route::get('{id}','PeriodController@show')->name('period.show');
    Route::post('edit','PeriodController@update')->name('period.edit');
})->middleware('koordinator');

Route::prefix('lecturers/')->group(function(){
    Route::get('','LecturerController@index')->name('lecturer.index');
    Route::post('assign','LecturerController@assign')->name('lecturer.assign');
    Route::post('unassign','LecturerController@unassign')->name('lecturer.unassign');
    Route::get('{id}','LecturerController@show')->name('lecturer.show');
    Route::post('group/assign','LecturerController@assignGroup')->name('lecturer.group.assign');
    Route::post('group/accept','LecturerController@acceptGroup')->name('lecturer.group.accept');
    Route::post('group/decline','LecturerController@declineGroup')->name('lecturer.group.decline');
    Route::post('log/accept','LecturerController@acceptLog')->name('lecturer.log.accept');
})->middleware('dosen');

Route::prefix('groups/')->group(function(){
    Route::get('','GroupController@index')->name('group.index');
    Route::get('create','GroupController@create')->name('group.create');
    Route::post('create','GroupController@store')->name('group.create');
    Route::post('delete','GroupController@destroy')->name('group.delete');
    Route::get('{id}','GroupController@show')->name('group.show');
    Route::get('{id}/edit','GroupController@edit')->name('group.edit');
    Route::post('{id}/edit','GroupController@update')->name('group.edit');

    Route::get('{id}/proof','ProofController@show')->name('proof.show');
    Route::post('proof/create','ProofController@store')->name('proof.create');
    Route::post('proof/delete','ProofController@delete')->name('proof.delete');

    Route::post('accept','GroupController@accept')->name('group.accept');
    Route::post('decline','GroupController@decline')->name('group.decline');

    Route::get('reports/create','ReportController@create')->name('report.create');
    Route::post('reports/create','ReportController@store')->name('report.create');
    Route::post('reports/delete','ReportController@delete')->name('report.delete');

    Route::post('status/update','GroupController@statusUpdate')->name('status.update');

    Route::post('abstract/update','GroupController@abstractUpdate')->name('abstract.update');
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

Route::group(function(){
    Route::get('valuation/communals', 'ValuationController@communal')->name('valuation.communal');
    Route::get('valuation/communals/edit','ValuationController@editCommunal')->name('valuation.communal.edit');
    Route::post('valuation/group/store', 'ValuationController@store')->name('valuation.store');    
})->middleware('dosen');

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
