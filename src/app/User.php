<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
    	'username', 'fullname', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function participations() {
    	return $this->hasMany('App\Participation');
    }

    public function submissions() {
        return $this->hasManyThrough('App\Submission', 'App\Participation');
    }

    public function score(Contest $contest) {
        $participation = Participation::where('user_id', $this->id)
                                        ->where('contest_id', $contest->id)
                                        ->first()->id;
        $correctTask = Submission::where('participation_id', $participation)
                        ->where('status', 1)->pluck('task_id')->all();

        $total = 0;
        foreach($contest->tasks->wherein('id', $correctTask) as $t) {
            $total += $t->pivot->points;
        }
        return $total;
    }

    public function isParticipate(Contest $contest) {
        $participated = $this->participations->pluck('contest_id');
        return $participated->contains($contest->id);
    }

    public function hasSolved(Task $task) {
        return $this->submissions->where('status', 1)->where('task_id', $task->id)->count();
    }

    public function getTotalScore(){
        return -1;
    }

    public function isAdmin() {
        return $this->type === 1;
    }

}
