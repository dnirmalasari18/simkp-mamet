<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'title', 'description'
    ];

    public function attachments(){
        return $this->hasMany('App\NewsAttachment', 'news_id');
    }
}
