<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'fullname','email', 'password', 'phone_number', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personable() {
		return $this->morphTo('personable');
	}
    
    public function groups(){
        return $this->belongsToMany('App\Group', 'student_details','group_id','student_id')->withPivot('student_id','group_id','accepted');
    }    

    public function getRoleAttribute() {
		if ($this->personable_type == 'App\Student') {
			return 'STUDENT';
		} else if ($this->personable_type == 'App\Lecturer') {
			if ($this->personable->nip == '0') {
				return 'ADMIN';
			} else if ($this->personable->nip == '1') {
				return 'TU';
			} else {
				return 'LECTURER';
			}
		} else {
			return 'UNKNOWN';
		}
    }		
    
    public function getPersonableTypeAttribute($type) {
		$type = strtolower($type);
		return 'App\\'. str_replace(' ', '', ucwords($type));
	}
}
