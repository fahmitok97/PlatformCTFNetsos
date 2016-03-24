<?php

use App\Contest;
use App\Category;
use App\Task;

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

// Route::get('/', function () {
// 	$contests = Contest::all();
//  	$categories = Category::all();
//     return view('test', [
//     	'contests' => $contests,
//     	'categories' => $categories
//     ]);
// });

// Route::get('/contest/{contest}', function(Contest $contest) {
// 	return view('testcontest', ['contest' => $contest]);
// });

// Route::get('/category/{category}', function(Category $category) {
// 	return view('testarchive', ['category' => $category]);
// });

// Route::get('/login', function() {
// 	return view('login');
// });

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
    Route::get('/', function() {
   	  	$categories = Category::all();
   	  	$contests = Contest::all();
    	return view('front', [
    			'categories' => $categories,
    			'contests' => $contests
    		]);
    });

    Route::get('/contest/{contest}', function(Contest $contest) {

        $category_ids = $contest->tasks->pluck('category_id')->all();
        $categories =  Category::find($category_ids);

    	return view('contest', [
    			'contest' => $contest,
                'categories' => $categories
    		]);
    });

    Route::get('/category/{category}', function(Category $category) {
        return view('category', [
                'category' => $category
            ]);
    });

    Route::get('/task/{task}', function(Task $task) {
        return view('task', [
            'task' => $task
            ]);
    });

    Route::get('/contests', function() {
        $contests = Contest::all();
        return view('contests', [
            'contests' => $contests
            ]);
    });
});
