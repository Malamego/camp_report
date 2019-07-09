<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class ClassModel extends Model
{
    protected $fillable = [
        'name','slug'
    ];

    public function users_relation()
    {
        return $this->hasMany('App\Models\User', 'class_id');
    }

    public function students_relation()
    {
        return $this->hasMany('App\Models\Student', 'class_id');
    }

    public function details_relation()
    {
        return $this->hasMany('App\Models\WeeksDetail', 'class_id');
    }
}
