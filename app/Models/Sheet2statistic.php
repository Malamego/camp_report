<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Sheet2statistic extends Model
{
    protected $fillable = [
         'title', 'image', 'content', 'datenow', 'allnet', 'course1',
          'course2','course3', 'course4', 'TT', 'friends', 'week_id',
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
