<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $fillable = [
        'name', 'start_date', 'end_date', 'final_date', 'active'
    ];
}
