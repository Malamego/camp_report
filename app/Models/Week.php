<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Week extends Model
{
    protected $fillable = [
        'name','slug', 'desc', 'need'
    ];

    public function details_relation()
    {
        return $this->hasMany('App\Models\WeeksDetail', 'week_id');
    }

    public function lessons_relation()
    {
        return $this->hasMany('App\Models\Lesson', 'week_id');
    }
}
