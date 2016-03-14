<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    //

    public function contestTasks() {
        return $this->hasMany('App\ContestTask');
    }

}
