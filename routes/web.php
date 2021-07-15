<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('HOME');


 /*
User page-------------------------------------------
*/
Route::get('/sistem/home/account/account_details/{user}', 'UserController@show');
Route::get('/sistem/home/account/account_details/account_edit/{user}', 'UserController@edit');

/*
Home page-------------------------------------------
*/
Route::get('/sistem/home/edit_team/{team}', 'TeamController@edit');
Route::get('/sistem/home/index', 'TeamController@index');
Route::get('/sistem/home/{team}/{objective}', 'TeamController@show');
Route::get('/sistem/home/add_team', 'TeamController@create');
Route::post('/sistem/home/index', 'TeamController@store');
Route::delete('/sistem/home/{team}', 'TeamController@destroy');
Route::patch('/sistem/home/{team}', 'TeamController@update');

/*
Monitoring page-------------------------------------------
*/
Route::get('/sistem/monitor/objective/new/{team}', 'MonitorController@create');
Route::get('/sistem/monitor/index/{team}', 'MonitorController@index')->name('sistem.monitor.index');
Route::get('/sistem/monitor/objective/details/{team}/{objective}', 'MonitorController@show');
Route::post('/sistem/monitor/index/{team}', 'MonitorController@store');
Route::get('/sistem/monitor/objective/edit/{team}/{objective}', 'MonitorController@edit');
Route::patch('/sistem/monitor/objective/details/{team}/{objective}', 'MonitorController@update');
Route::delete('/sistem/monitor/objective/details/{team}/{objective}', 'MonitorController@destroy');

/*
Keyresult page-------------------------------------------
*/
Route::get('/sistem/monitor/keyresult/new/{team}/{objective}', 'KeyresultController@create');
Route::post('/sistem/monitor/keyresult/details/{team}/{objective}', 'KeyresultController@store')->name('sistem.monitor.keyresult.store');
Route::get('/sistem/monitor/keyresult/details/{team}/{objective}/{keyresult}', 'KeyresultController@show');
Route::get('sistem/monitor/keyresult/edit/{team}/{objective}/{keyresult}', 'KeyresultController@edit');
Route::patch('/sistem/monitor/keyresult/details/{team}/{objective}/{keyresult}', 'KeyresultController@update')->name('sistem.monitor.keyresult.details');
Route::delete('/sistem/monitor/keyresult/details/{team}/{objective}/{keyresult}', 'KeyresultController@destroy');
/*
task page-------------------------------------------
*/
Route::get('/sistem/monitor/task/new/{team}/{objective}', 'TaskController@create');
Route::post('/sistem/monitor/objective/details/{team}/{objective}', 'TaskController@store')->name('sistem.task.store');
Route::get('/sistem/monitor/task/details/{team}/{objective}/{task}', 'TaskController@show');
Route::get('sistem/monitor/task/edit/{team}/{objective}/{task}', 'TaskController@edit');
Route::patch('/sistem/monitor/task/details/{team}/{objective}/{task}', 'TaskController@update')->name('sistem.task.update');
Route::delete('/sistem/monitor/task/details/{team}/{objective}/{task}', 'TaskController@destroy');

/* report page */
Route::get('/sistem/monitor/objective/report/{team}/{objective}', 'ReportController@create')->name('sistem.report.create');
Route::post('/sistem/monitor/objective/report/details/{team}/{objective}', 'ReportController@store')->name('sistem.report.store');
Route::get('/sistem/monitor/objective/report/index/{team}/{objective}', 'ReportController@index')->name('sistem.report.index');

Route::get('/sistem/monitor/objective/report/index/{team}/{objective}/{filename}', 'ReportController@getReport')->name('sistem.report.download');