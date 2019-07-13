<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpNote extends Model
{
    //
    protected $fillable = [
        'corp_id', 'detail'
    ];

    public function corp(){
        return $this->belongsTo('App\Corp');
    }
}
