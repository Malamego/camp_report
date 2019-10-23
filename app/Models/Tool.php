<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Tool extends Model
{
    protected $fillable = [
        'name','slug'
    ];

    // public function users_relation()
    // {
    //     return $this->hasMany('App\Models\User', 'class_id');
    // }


}
