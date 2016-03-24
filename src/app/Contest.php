<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function hints() {
        return $this->hasMany('App\Hint');
    }

    public function participations() {
    	return $this->hasMany('App\Participation');
    }

}
