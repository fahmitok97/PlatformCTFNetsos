<?php

use App\Contest;
use App\Category;

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
    	return view('front', [
    			'categories' => $categories,
    		]);
    });
});
