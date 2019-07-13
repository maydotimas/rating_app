<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::get('/dashboard', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::resource('reactions', 'ReactionsController');
    Route::resource('user-reactions', 'UserReactionsController');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'DashboardController@index');

Route::get('/monthly', function () {
    return view('admin.monthly.index');
});
