<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Statistic extends Model
{
    protected $fillable = [
         'title', 'image', 'content', 'datenow', 'mission', 'decision',
          'ob1','ob2', 'ob3', 'ob4', 'ob5', 'ob6','papers', 'stu_num',
          'holy_spirit', 'mission_no_student', 'mission_all','week_id',
          'student_id', 'status',
    ];

    public function week_relation()
    {
        return $this->belongsTo('App\Models\Week', 'week_id');
    }

    public function student_relation()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // public function questions_relation()
    // {
    //     return $this->hasMany('App\Models\Question', 'lesson_id');
    // }


}
