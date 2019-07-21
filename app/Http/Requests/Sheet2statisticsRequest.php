<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sheet2statisticsRequest extends FormRequest
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
            'allnet'                 => 'nullable|integer',
            'course1'                => 'nullable|integer',
            'course2'                => 'nullable|integer',
            'course3'                => 'nullable|integer',
            'course4'                => 'nullable|integer',
            'TT'                     => 'nullable|integer',
            'friends'                => 'nullable|integer',          
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
            'allnet'                     => trans('main.allnet'),
            'course1'                    => trans('main.course1'),
            'course2'                    => trans('main.course2'),
            'course3'                    => trans('main.course3'),
            'course4'                    => trans('main.course4'),
            'TT'                         => trans('main.TT'),
            'friends'                    => trans('main.friends'),
            'status'                     => trans('main.status'),
            'image'                      => trans('main.image'),
            'content'                    => trans('main.notes'),
        ];
    }
}
