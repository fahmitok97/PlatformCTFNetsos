<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contest;
use App\Category;
use App\Task;
use App\User;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contests = Contest::all();
        return view('dashboard.admin.contest.index', [
            'contests' => $contests
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.contest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $contest = new Contest;
        $contest->name = $request->input('name');
        $contest->description = $request->input('description');
        $contest->save();

        return redirect('admin/contest/' . $contest->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.admin.contest.show', [
                'contest' => Contest::find($id)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contest = Contest::find($id);
        $users = User::find($contest->participations->pluck('user_id')->all());
        return view('dashboard.admin.contest.edit', [
                'contest' => $contest,
                'tasks' => Task::all(),
                'users' => $users
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $contest = Contest::find($id);
        $contest->name = $request->input('name');
        $contest->description = $request->input('description');
        $contest->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addTask(Request $request, Contest $contest)
    {
        $taskId = $request->input('task-id');
        $points = $request->input('task-points');
        if($contest->tasks->where('id', intval($taskId))->count()) {
            $task = $contest->tasks->where('id', intval($taskId))->first();
            $task->pivot->points = $points;
            $task->pivot->save();
        } else {
            $contest->tasks()->attach($taskId, ['points' => $points]);
        }
        return back();
    }

    public function deleteTask(Contest $contest, Task $task)
    {
        $contest->tasks()->detach($contest->id);
        return back();
    }
}
