<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function corp(){
        return $this->belongsTo('App\Corp');
    }

    public function period(){
        return $this->belongsTo('App\Period');
    }

    public function students(){
        return $this->belongsToMany('App\User','student_details','group_id','student_id');
    }
}
