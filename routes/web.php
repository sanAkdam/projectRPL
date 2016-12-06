<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function() {

    Route::get('/', function() {
        return view('welcome');
    })->name('/');

    Route::get('/register', function() {
        return view('user.register');
    })->name('register');

    Route::get('/login', function() {
        return view('user.login');
    })->name('login');

    Route::get('/barang/posting', function() {
        return view('user.posting');
    })->name('posting')->middleware('auth');

    Route::get('/logout', [
        'uses' => 'LogoutController@index',
        'as' => 'logout',
    ]);

    Route::get('barang/list/hilang', [
        'uses' => 'HomeController@listBarangHilang',
        'as' => 'listBarangHilang',
    ]);

    Route::get('barang/list/ketemu', [
        'uses' => 'HomeController@listBarangKetemu',
        'as' => 'listBarangKetemu',
    ]);

    Route::get('admin/list/users/all', [
        'uses' => 'AdminController@selectAllUsers',
        'as' => 'listuser',
        'middleware' => 'auth',
    ]);

    Route::get('/admin/list/users/report', [
        'uses' => 'AdminController@userReport',
        'as' => 'pesanreport',
        'middleware' => 'auth',
    ]);

    Route::get('/barang/posting/{id}', [
       'uses' => 'MemberController@updatePosting',
        'as' => 'update'
    ]);

    Route::post('/barang/update/posting/{id}', [
       'uses' => 'MemberController@userUpdatePosting',
        'as' => 'updatePosting',
        'middleware' => 'auth',
    ]);

    Route::get('/barang/delete/posting/{id}', [
        'uses' => 'MemberController@userDeletePosting',
        'as' => 'delete',
        'middleware' => 'auth',
    ]);

    Route::post('/user/register', [
        'uses' => 'RegisterController@index',
        'as' => 'userRegister',
    ]);

    Route::post('/user/login', [
        'uses' => 'LoginController@index',
        'as' => 'userLogin',
    ]);

    Route::post('/user/barang/posting', [
        'uses' => 'MemberController@postingbarang',
        'as' => 'userPosting',
        'middleware' => 'auth',
    ]);

    Route::post('/user/barang/posting/update', [
        'uses' => 'MemberController@update',
        'as' => 'barangUpdate',
    ]);

    Route::get('/user/posting/report/{id}', [
       'uses' => 'MemberController@reportPosting',
       'as' => 'reportPosting',
       'middleware' => 'auth',
    ]);

    Route::get('/admin/posting/lihat/{id}', [
        'uses' => 'AdminController@lihatUserPosting',
        'as' => 'lihatposting',
        'middleware' => 'auth',
    ]);

    Route::get('/admin/posting/delete/{id}', [
        'uses' => 'AdminController@deleteUserPosting',
        'as' => 'admindeleteposting',
        'middleware' => 'auth',
    ]);

    Route::get('/admin/report/delete/{id}', [
       'uses' => 'AdminController@deleteUserReport',
        'as' => 'deletereport',
        'middleware' => 'auth',
    ]);

    Route::post('/user/posting/report/send/{id}', [
       'uses' => 'MemberController@userReportPosting',
        'as' => 'userReportPosting',
        'middleware' => 'auth',
    ]);

    Route::get('/user/cari/posting', [
       'uses' => 'CariController@cariPostingBarang',
        'as' => 'cariposting',
    ]);
});