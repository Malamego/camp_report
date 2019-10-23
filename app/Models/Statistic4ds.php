<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Statistic4ds extends Model
{
    protected $fillable = [
         'title', 'image', 'content', 'datenow', 'mission', 'interact', 'decision',
          'ob1','ob2', 'ob3', 'ob4', 'ob5', 'ob6', 'level1', 'level2', 'level3', 'level4','tot',
          'pool', 'story', 'tool_id','week_id',
          'student_id', 'status',
    ];

    public function weekds_relation()
    {
        return $this->belongsTo('App\Models\Week', 'week_id');
    }

    public function studentds_relation()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function tool_relation()
    {
        return $this->belongsTo('App\Models\Tool', 'tool_id');
    }

}
