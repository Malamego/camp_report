<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class WeeksDetail extends Model
{
    protected $fillable = [
        'week_id', 'class_id',  'startdate', 'enddate',  'status'
    ];

    public function week_relation()
    {
        return $this->belongsTo('App\Models\Week', 'week_id');
    }

    public function class_relation()
    {
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public function student_relation()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
