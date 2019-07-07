<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsAttachment extends Model
{
    //
    protected $fillable = [
        'news_id', 'path', 'filename'
    ];
}
