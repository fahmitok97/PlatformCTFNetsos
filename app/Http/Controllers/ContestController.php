<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use App\Contest;
use App\Category;
use App\Task;
use App\Submission;
use App\Participation;

class ContestController extends Controller
{
    public function index() {
        $contests = Contest::orderBy('start_date', 'DESC')->get();
        return view('contests', [
            'contests' => $contests
            ]);
    }

    public function show(Contest $contest) {
        if (Participation::where('user_id', Auth::user()->id)->where('contest_id', $contest->id)->get()->isEmpty())
            return redirect('/participate/' . $contest->id);

        $category_ids = $contest->tasks->pluck('category_id')->all();
        $categories =  Category::find($category_ids);

        return view('contest', [
                'contest' => $contest,
                'categories' => $categories,
            ]);
    }

    public function showTask(Contest $contest, Task $task) {
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
    }

    public function submitTask(Contest $contest, Task $task, Request $request) {
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
        if (Auth::user()->hasSolved($task) || $contest->isFinished()) {
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

    }

    public function showLeaderboard(Contest $contest) {
        return view('leaderboard', [
            'contest' => $contest
            ]);
    }
}
