<?php

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Contest;
use App\Category;
use App\Task;
use App\Submission;
use App\Participation;
use App\User;
use App\Config;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PageController@home');
    Route::get('/contest', 'ContestController@index');
    Route::get('/user/{user}', 'UserController@show');
    Route::get('/leaderboard', 'PageController@leaderboard');
    Route::get('/contest/{contest}/leaderboard', 'ContestController@showLeaderboard');
    Route::auth();

});

Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get('/participate/{contest}', 'ParticipationController@create');
    Route::post('/participate/{contest}', 'ParticipationController@store');
    Route::get('/contest/{contest}', 'ContestController@show');
    Route::get('/contest/{contest}/task/{task}', 'ContestController@showTask');
    Route::put('/contest/{contest}/task/{task}', 'ContestController@submitTask');

});

Route::group(['middleware' => ['web', 'auth', 'admin']], function () {

    Route::get('/admin', 'PageController@admin');
    Route::resource('/admin/category', 'Admin\CategoryController');
    Route::resource('/admin/contest', 'Admin\ContestController');
    Route::resource('/admin/task', 'Admin\TaskController');
    Route::put     ('/admin/contest/{contest}/task', 'Admin\ContestController@addTask');
    Route::delete  ('/admin/contest/{contest}/task/{task}', 'Admin\ContestController@deleteTask');
});
