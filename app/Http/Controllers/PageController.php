<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contest;
use App\User;
use App\Category;
use App\Task;
use App\Config;

class PageController extends Controller
{
    public function home() {
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
    }

    public function leaderboard() {
        return view('leaderboard');
    }

    public function admin() {
        return view('dashboard.admin.app', [
                'contests' => Contest::all(),
                'tasks' => Task::all(),
                'categories' => Category::all()
            ]);
    }
}
