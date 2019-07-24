<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRequest extends Model
{
    public $timestamps = false;
    protected $morphClass = "group request";

    protected static $status_collection = [
		['status' =>  0, 'name' => 'created', 'desc' => 'Permintaan untuk bergabung', 'changeto' => [1, -1]],
		['status' => -1, 'name' => 'denied', 'desc' => 'Permintaan ditolak', 'changeto' => []],
		['status' =>  1, 'name' => 'accepted', 'desc' => 'Permintaan diterima', 'changeto' => []],
	];
    
    public static function statusAll() {
		return collect(static::$status_collection);
	}

	public function getStatusAttribute($status) {
		return collect(static::$status_collection)
				->where('status', (int)$status)
				->first();
	}

    public function group(){
        return $this->belongsTo('App\Group');
    }
    
    public function notification(){
        return $this->morphOne('App\Notification', 'notifiable');
    }
}
