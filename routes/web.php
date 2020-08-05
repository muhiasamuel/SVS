<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    dd(request()->get('query'));
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
Route::get('/view/candidates/', 'CandidateController@index')->name('candidates.view');
Route::get('/view/delegate/', 'CandidateController@viewDelegates')->name('delegates.view');
Route::get('/vote/candidate/', 'PollController@Index')->name('candidates.vote');
Route::get('/candidates/poll{id}', 'PollController@vote')->name('candidate.poll');
Route::get('/view/results/', 'PollController@voteCount')->name('results.view');
Route::resource('/poll', 'PollController');
