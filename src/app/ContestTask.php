<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestTask extends Model
{
    //

    public function contest() {
        return $this->belongsTo('App\Contest');
    }

    public function task() {
        return $this->belongsTo('App\Task');
    }

}
