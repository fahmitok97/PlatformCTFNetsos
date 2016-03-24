<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{

    public function contests(){
    	return $this->belongsToMany('App\Contest');
    }

    public function task() {
    	return $this->belongsTo('App\Task');
    }

}
