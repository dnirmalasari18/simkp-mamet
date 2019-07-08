<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $fillable = [
        'name', 'start_date', 'end_date', 'final_date', 'active'
    ];

    public static function current() {
		$now = date('Y-m-d');
		$semester = static::where('start_date', '<=', $now)
				->where('end_date', '>=', $now)
				->orderBy('start_date')
				->get();
		return $semester->first();
	}

	public static function allowedToRegister() {
		$current = static::current();
		if ($current == null) {
			return false;
		}

		$start = strtotime($current->start_date);
		$end = strtotime($current->user_due_date);
		$now = time();
		return ($now >= $start) && ($now <= $end);
	}
}
