<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{


    public function participation(){
    	return $this->belongsTo('App\Participation');
    }

    public function task(){
    	return $this->belongsTo('App\Task');
    }


}
