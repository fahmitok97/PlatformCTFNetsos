<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{

    public function tasks() {
        return $this->belongsToMany('App\Task');
    }

    public function hints() {
        return $this->belongsToMany('App\Hint');
    }

    public function participations() {
    	return $this->hasMany('App\Participation');
    }

}
