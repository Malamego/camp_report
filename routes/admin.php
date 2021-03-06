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

Route::middleware(\App\Http\Middleware\LangMiddleware::class)->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/lang/{lang}', 'AdminController@changeLang')->name('admin.changeLang');

    // users
    Route::resource('users', 'UsersController');
    Route::post('users/multi_delete', 'UsersController@multi_delete')->name('users.multi_delete');

    // roles and permissions
    Route::resource('roles', 'RoleController');
    Route::post('/roles/multi_delete', 'RoleController@multi_delete')->name('roles.multi_delete');

    Route::resource('permissions', 'PermissionController');
    Route::post('permissions/multi_delete', 'PermissionController@multi_delete')->name('permissions.multi_delete');

    // Statistics
    Route::resource('statistics', 'StatisticsController');
    Route::post('statistics/multi_delete', 'StatisticsController@multi_delete')->name('statistics.multi_delete');

    // sheet2Statistics
    Route::resource('sheet2statistics', 'Sheet2statisticsController');
    Route::post('sheet2statistics/multi_delete', 'Sheet2statisticsController@multi_delete')->name('sheet2statistics.multi_delete');

    // statistics4DS
    Route::resource('statistics4ds', 'Statistics4dsController');
    Route::post('statistics4ds/multi_delete', 'Statistics4dsController@multi_delete')->name('statistics4ds.multi_delete');

    // statistics4PROF
    Route::resource('statistics4prof', 'Statistics4profController');
    Route::post('statistics4prof/multi_delete', 'Statistics4profController@multi_delete')->name('statistics4prof.multi_delete');


    // classes
    Route::resource('classes', 'ClassesController');
    Route::post('classes/multi_delete', 'ClassController@multi_delete')->name('classes.multi_delete');


    // tools
    Route::resource('tools', 'ToolsController');
    Route::post('tools/multi_delete', 'ToolsController@multi_delete')->name('tools.multi_delete');

    // weeks
    Route::resource('weeks', 'WeeksController');
    Route::post('weeks/multi_delete', 'WeeksController@multi_delete')->name('weeks.multi_delete');

    // weeks_Details
    Route::resource('weeks_details', 'WeeksDetailsController');
    Route::post('weeks_details/multi_delete', 'WeeksDetailsController@multi_delete')->name('weeks_details.multi_delete');

    // Students
    Route::resource('students', 'StudentsController');
    Route::post('students/multi_delete', 'StudentsController@multi_delete')->name('students.multi_delete');

});
