<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function contest(){
    	return $this->belongsTo('App\Contest');
    }

    public function submissions() {
    	return $this->hasMany('App\Submission');
    }

}
