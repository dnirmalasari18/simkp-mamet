<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected static $status_collection = [
		['status' => 0, 'name' => 'created', 'desc' => 'Log belum disetujui oleh pembimbing', 'changeto' => [1]],
		['status' => 1, 'name' => 'accepted', 'desc' => 'Log sudah disetujui oleh pembimbing', 'changeto' => []],
    ];
    
    public static function statusAll() {
		return collect(static::$status_collection);
	}

	public function getStatusAttribute($status) {
		return collect(static::$status_collection)
				->where('status', (int)$status)
				->first();
    }

    protected $fillable = [
        'group_id', 'title', 'path', 'status'
    ];
}
