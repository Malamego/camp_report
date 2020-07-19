<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Statistic4prof extends Model
{
    protected $fillable = [
    'name', 'image', 'content', 'datenow', 'mission', 'decision', 'ob1', 'ob2', 'ob3', 'ob4',
    'ob5', 'ob6', 'friendmission', 'frienddecision', 'friendfollow', 'level1', 'level2', 'level3',
    'level4', 'tot', 'talmazagroup', 'missionhours', 'jesustime', 'church', 'traininteract',
    'loven', 'week_id', 'student_id', 'status',
    ];


  public function weekprof_relation()
  {
    return $this->belongsTo('App\Models\Week', 'week_id');
  }

  public function studentprof_relation()
  {
    return $this->belongsTo('App\Models\Student', 'student_id');
  }

}
