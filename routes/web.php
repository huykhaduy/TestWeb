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

Route::get('/login', 'MyLoginController@getLogin')->name("getLogin");
Route::post('/login', 'MyLoginController@postLogin')->name("postLogin");
Route::get('/register', 'MyLoginController@getRegister')->name("getRegister");
Route::post('/register', 'MyLoginController@postRegister')->name("postRegister");
Route::get('/logout', 'HomeController@logOut')->name("logOut");

Route::middleware(['cors'])->group(function () {
    Route::get('/check-ip-config', 'AdminController@CheckIpConfig');
});

Route::middleware(['checkLogin', 'singleLogin', 'checkStatusUser'])->group(function () {
    Route::get('/', 'HomeController@getHome')->name("homeUser");
    Route::get('/showChapter', 'HomeController@showChapter')->name("showChapter");
    Route::middleware(['checkAdmin'])->group(function () {
        Route::get('/admin', 'AdminController@getHome')->name("homeAdmin");
        Route::get('/ip-config', 'AdminController@ipConfig')->name("ipConfig");
        Route::get('/user-management', 'AdminController@userManagement')->name("userManagement");
        Route::post('/get-list-ip', 'AdminController@getListIp');
        Route::post('/get-list-user', 'AdminController@getListUser');
        Route::post('/add-ip', 'AdminController@addIp');
        Route::post('/update-ip', 'AdminController@updateIp');
        Route::post('/update-user', 'AdminController@updateUser');
        Route::post('/delete-ip', 'AdminController@deleteIp');
        Route::post('/delete-user', 'AdminController@deleteUser');
       
    });
});
Route::get('/503', function () {
    return view('error.503');
});
Route::get('/index.html', function () {
    return view('user.home');
});


