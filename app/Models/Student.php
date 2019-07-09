<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Student extends Authenticatable
{
    // use Notifiable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'image', 'phone', 'class_id', 'imei', 'identity', 'user_id'
    ];


    public function class_relation()
    {
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public function user_relation()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function details_relation()
    {
        return $this->hasMany('App\Models\WeeksDetail', 'student_id');
    }

}
