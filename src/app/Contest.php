<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{

    public function tasks() {
        return $this->belongsToMany('App\Task')->withPivot('points', 'start_date', 'end_date');
    }

    public function hints() {
        return $this->belongsToMany('App\Hint');
    }

    public function participations() {
    	return $this->hasMany('App\Participation');
    }

    public function submissions()
    {
        return $this->hasManyThrough('App\Submission', 'App\Participation');
    }

    public function getParticipants() {
        return User::find($this->participations->pluck('user_id')->all());
    }

    public function getCorrectSubmissions() {
        return $this->submissions->where('status', 1)->all();
    }

    /**
     * return array of objects with three attributes: position, user, points
     */
    public function getScoreBoardData() {
        $participations = $this->participations;
        foreach ($participations as $p) {
            $p->final_points = $p->user->score($this);
        }
        $participations = $participations->sortByDesc('final_points');

        $i = 1;
        foreach ($participations as $p) {
            $p->final_position = $i++;
        }

        return $participations;
    }

    public function getFinalScoreBoardData() {
        return $this->participations->sortByDesc('final_position');
    }

}
