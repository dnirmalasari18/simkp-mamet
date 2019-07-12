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
    
    public function groups(){
        return $this->belongsToMany('App\Group', 'student_details','student_id','group_id');
    }    

    public function details(){
        if ($this->role == 'mahasiswa'){
            return $this->belongsToMany('App\StudentDetail','student_id');
        }
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }
}
