<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
         'start_date', 'end_date', 'type'
    ];

    protected static $status_collection = [
		['status' =>  0, 'name' => 'created', 'desc' => 'Pengajuan kelompok KP baru saja dibuat', 'changeto' => [1, -1]],
		['status' => -1, 'name' => 'denied', 'desc' => 'Pengajuan kelompok KP ditolak oleh Koor KP', 'changeto' => []],
		['status' =>  1, 'name' => 'confirmed', 'desc' => 'Pengajuan kelompok KP telah dikonfirmasi', 'changeto' => [2, -2]],
		['status' => -2, 'name' => 'rejected', 'desc' => 'Pengajuan kelompok KP ditolak perusahaan', 'changeto' => []],
		['status' =>  2, 'name' => 'progress', 'desc' => 'Pengajuan kelompok KP diterima perusahaan', 'changeto' => [3]],
		['status' =>  3, 'name' => 'finished', 'desc' => 'Proses KP telah selesai', 'changeto' => [2]],
	];

    protected static $type_collection = [
        ['type' =>  0, 'name' => 'KP', 'desc' => 'Kerja Praktik', 'changeto' => []],
        ['type' =>  1, 'name' => 'MAGANG', 'desc' => 'Magang', 'changeto' => []],
    ];

	public static function statusAll() {
		return collect(static::$status_collection);
	}

	public function getStatusAttribute($status) {
		return collect(static::$status_collection)
				->where('status', (int)$status)
				->first();
    }

    public static function typeAll() {
		return collect(static::$status_collection);
	}

	public function getTypeAttribute($type) {
		return collect(static::$type_collection)
				->where('type', (int)$type)
				->first();
	}

    public function corp(){
        return $this->belongsTo('App\Corp');
    }

    public function period(){
        return $this->belongsTo('App\Period');
    }

    public function students(){
        return $this->belongsToMany('App\User','student_details','group_id','student_id');
    }

    public function studentsdetails(){
        return $this->hasMany('App\StudentDetail');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function lecturer(){
        return $this->belongsTo('App\User', 'lecturer_id');
    }
}
