<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    //
    protected $fillable = [
        'name', 'city', 'address', 'type', 'profile','phone_number', 
    ];
}
