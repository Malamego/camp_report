<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                  => 'required',
            'week_id'                => 'required|exists:weeks,id',
            'student_id'             => 'required|exists:students,id',
            'datenow'                => 'required',
            'mission'                => 'required|integer',
            'decision'               => 'required|integer',
            'ob1'                    => 'required|integer',
            'ob2'                    => 'required|integer',
            'ob3'                    => 'required|integer',
            'ob4'                    => 'required|integer',
            'ob5'                    => 'required|integer',
            'ob6'                    => 'required|integer',
            'papers'                 => 'required|integer',
            'stu_num'                => 'required|integer',
            'holy_spirit'            => 'required|integer',
            'mission_no_student'     => 'required|integer',
            'mission_all'            => 'required|integer',
            'status'                 => 'required|in:active,inactive',
            'image'                  => 'required|image',
            'content'                => 'nullable',

        ];
    }


    public function attributes()
    {
        return [
            'title'                      => trans('main.title'),
            'week_id'                    => trans('main.week'),
            'student_id'                 => trans('main.student'),
            'datenow'                    => trans('main.date'),
            'mission'                    => trans('main.mission'),
            'decision'                   => trans('main.decision'),
            'ob1'                        => trans('main.observation1'),
            'ob2'                        => trans('main.observation2'),
            'ob3'                        => trans('main.observation3'),
            'ob4'                        => trans('main.observation4'),
            'ob5'                        => trans('main.observation5'),
            'ob6'                        => trans('main.observation6'),
            'papers'                     => trans('main.papers'),
            'stu_num'                    => trans('main.students_num'),
            'holy_spirit'                => trans('main.holy_spirit'),
            'mission_no_student'         => trans('main.mission_no_student'),
            'mission_all'                => trans('main.mission_all'),
            'status'                     => trans('main.status'),
            'image'                      => trans('main.image'),
            'content'                    => trans('main.notes'),
        ];
    }
}
