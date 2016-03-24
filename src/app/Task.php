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
    	return $this->belongsToMany('App\Contest');
    }

    public function submissions() {
    	return $this->hasMany('App\Submission');
    }

    public function hints() {
    	return $this->hasMany('App\Hint');
    }
}
