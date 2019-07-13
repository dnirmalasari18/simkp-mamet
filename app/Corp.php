<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    //
    protected $fillable = [
        'name', 'city', 'address', 'type', 'profile','phone_number',
    ];

    public function groups(){
        return $this->hasMany('App\Group');
    }

    public function notes(){
        return $this->hasMany('App\CorpNote');
    }
}
