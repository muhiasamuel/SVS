<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
    return view('welcome');
});
Route::any('/search', function () {
    dd(Input::get('q'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users') ->group(function () {
        #code
        Route::resource('/users', 'UsersController',['except' =>['show','create','store']]);
        Route::resource('/schools', 'SchoolsController',['except' =>['show','store']]);
        Route::resource('/school', 'SchoolController');
    
});
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('user/{id}', 'Profile\ProfileController@profile')->name('user.profile');
Route::get('/edit/user/', 'Profile\ProfileController@editAuthUser')->name('user.edit');
Route::get('/view/user/', 'Profile\ProfileController@viewAuthUser')->name('user.view');
Route::post('/update/user/', 'Profile\ProfileController@updateAuthUser')->name('user.update');

