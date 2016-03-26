<?php

use Illuminate\Http\Request;
use App\Contest;
use App\Category;
use App\Task;
use App\Submission;
use App\Participation;
use App\User;

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
    Route::get('/', function() {
   	  	$categories = Category::all();
   	  	$contests = Contest::limit(2)->get();
        $users = User::all();

        foreach ($users as $user) {
            $user->total_score = $user->getTotalScore();
        }

        $users = $users->sortByDesc('total_score');

    	return view('front', [
    			'categories' => $categories,
    			'contests' => $contests,
                'users' => $users
    		]);
    });

    Route::get('/contest', function() {
        $contests = Contest::all();
        return view('contests', [
            'contests' => $contests
            ]);
    });

    Route::get('/contest/{contest}', function(Contest $contest) {
        if (Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->get()->isEmpty())
            return redirect('/participate/' . $contest->id);

        $category_ids = $contest->tasks->pluck('category_id')->all();
        $categories =  Category::find($category_ids);

        $users = User::find($contest->participations->pluck('user_id')->all());
        
        foreach ($users as $user) {
            $user->score = $user->score($contest);
        }

        $users = $users->sortByDesc('score');

        return view('contest', [
                'contest' => $contest,
                'categories' => $categories,
                'users' => $users
            ]);
    });

    Route::get('/contest/{contest}/task/{task}', function(Contest $contest, Task $task) {
        if (Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->get()->isEmpty())
            return redirect('/participate/' . $contest->id);

        if(count($contest->tasks->where('id', $task->id))) {
            return view('task', [
               'task' => $task,
               'contest' => $contest
            ]);
        } else {
            return "what are you doing?";
        }
    });

    Route::put('/contest/{contest}/task/{task}', function(Contest $contest, Task $task, Request $request) {
        if (Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->get()->isEmpty())
            return redirect('/participate/' . $contest->id);

        if(!count($contest->tasks->where('id', $task->id)))
            return "what are you doing?";

        $answer = $request->input('answer');
        $status = ($answer == $task->answer);

        $submission = new Submission;
        $submission->participation_id = Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->first()->id;
        $submission->task_id = $task->id;
        $submission->submitted_answer = $answer;
        $submission->status = $status;
        $submission->save();

        return view('task', [
           'task' => $task,
           'contest' => $contest,
           'status' => $status
        ]);

    });

    Route::get('/participate/{contest}', 'ParticipationController@create');
    Route::post('/participate/{contest}', 'ParticipationController@store');

    Route::get('/user/{user}', 'UserController@show');

    Route::auth();

    Route::get('/home', 'HomeController@index');

});

Route::group(['middleware' => ['web', 'admin']], function () {

    Route::get('/admin', function() {
        return view('dashboard.admin.app', [
                'contests' => Contest::all(),
                'tasks' => Task::all(),
                'categories' => Category::all()
            ]);
    });

    Route::resource('/admin/category', 'CategoryController');
    Route::resource('/admin/contest', 'ContestController');
    Route::resource('/admin/task', 'TaskController');
    Route::put     ('/admin/contest/{contest}/task', 'ContestController@addTask');
    Route::delete  ('/admin/contest/{contest}/task/{task}', 'ContestController@deleteTask');
});
