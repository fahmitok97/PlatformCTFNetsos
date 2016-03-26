<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function contests() {
    	return $this->belongsToMany('App\Contest')->withPivot('points', 'start_date', 'end_date');
    }

    public function submissions() {
    	return $this->hasMany('App\Submission');
    }

    public function hints() {
    	return $this->hasMany('App\Hint');
    }

    public function getCorrectSubmissions(Contest $contest) {
        return $contest->submissions->where('status', 1)->where('task_id', $this->id)->all();
    }
}
