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

    Route::get('/', function() {
        $headlineContestId = Config::where('key', 'headlineContest')->first()->value;
        $lastWeekContestId = Config::where('key', 'lastWeekContest')->first()->value;

        $headlineContest = Contest::find($headlineContestId);

        if ($lastWeekContestId == -1) {
            $showLastWeekLeaderboard = False;
            $lastWeekContest = null;
        } else {
            $showLastWeekLeaderboard = True;
            $lastWeekContest = Contest::find($lastWeekContestId);
        }

        $latestContests = Contest::limit(2)->get();
   	  	$categories = Category::all();

        $users = User::all();
        foreach ($users as $user) {
            $user->total_score = $user->getTotalScore();
        }
        $users = $users->sortByDesc('total_score');
        $users = $users->take(10);

    	return view('front', [
    			'categories' => $categories,
    			'contests' => $latestContests,
                'users' => $users,
                'headlineContest' => $headlineContest,
                'lastWeekContest' => $lastWeekContest,
                'showLastWeekLeaderboard' => $showLastWeekLeaderboard
    		]);
    });

    Route::get('/contest', function() {
        $contests = Contest::orderBy('start_date', 'DESC')->get();
        return view('contests', [
            'contests' => $contests
            ]);
    });

    Route::get('/user/{user}', 'UserController@show');

    Route::get('/leaderboard', function() {
        return view('leaderboard');
    });

    Route::get('/contest/{contest}/leaderboard', function(Contest $contest) {
        return view('leaderboard', [
            'contest' => $contest
            ]);
    });

    Route::auth();

});

Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get('/participate/{contest}', 'ParticipationController@create');

    Route::post('/participate/{contest}', 'ParticipationController@store');

    Route::get('/contest/{contest}', function(Contest $contest) {
        if (Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->get()->isEmpty())
            return redirect('/participate/' . $contest->id);

        $category_ids = $contest->tasks->pluck('category_id')->all();
        $categories =  Category::find($category_ids);

        return view('contest', [
                'contest' => $contest,
                'categories' => $categories,
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
        $submission->participation_id = Participation::where('user_id', Auth::user()->id)
                                        ->where('contest_id', $contest->id)->first()->id;
        $submission->task_id = $task->id;
        $submission->submitted_answer = $answer;
        $submission->status = $status;
        $submission->added_time = Carbon::now();
        if (Auth::user()->hasSolved($task)) {
            $submission->graded = False;
        } else {
            $submission->graded = True;
        }
        $submission->save();

        return view('task', [
           'task' => $task,
           'contest' => $contest,
           'status' => $status
        ]);

    });

});

Route::group(['middleware' => ['web', 'auth', 'admin']], function () {

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
