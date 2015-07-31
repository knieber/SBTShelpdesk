<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/create', 'PublicTicketsController@index');
Route::post('/create', 'PublicTicketsController@createTicket');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/home', 'PagesController@home');

    Route::put('/tickets/ajax', 'TicketsController@ajaxUpdate');
    Route::resource('/tickets', 'TicketsController');
    Route::resource('/profile', 'ProfileController');
    Route::get('/helpdesk/alldepartments/{filter}', 'HelpDeskController@allTicketsView');
    Route::get('/helpdesk/{department_code}/{filter}', 'HelpDeskController@departmentView');
});
