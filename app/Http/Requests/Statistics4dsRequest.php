<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Statistics4dsRequest extends FormRequest
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
            'tool_id'                => 'required|exists:tools,id',
            'interact'               => 'nullable|integer',
            'datenow'                => 'required',
            'mission'                => 'nullable|integer',
            'decision'               => 'nullable|integer',
            'ob1'                    => 'nullable|integer',
            'ob2'                    => 'nullable|integer',
            'ob3'                    => 'nullable|integer',
            'ob4'                    => 'nullable|integer',
            'ob5'                    => 'nullable|integer',
            'ob6'                    => 'nullable|integer',
            'level1'                 => 'nullable|integer',
            'level2'                 => 'nullable|integer',
            'level3'                 => 'nullable|integer',
            'level4'                 => 'nullable|integer',
            'tot'                    => 'nullable|integer',
            'pool'                   => 'nullable|integer',
            'story'                  => 'nullable',
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
            'tool_id'                    => trans('main.tool'),
            'interact'                   => trans('main.interact'),
            'datenow'                    => trans('main.date'),
            'mission'                    => trans('main.mission'),
            'decision'                   => trans('main.decision'),
            'ob1'                        => trans('main.observation1'),
            'ob2'                        => trans('main.observation2'),
            'ob3'                        => trans('main.observation3'),
            'ob4'                        => trans('main.observation4'),
            'ob5'                        => trans('main.observation5'),
            'ob6'                        => trans('main.observation6'),
            'level1'                     => trans('main.level1'),
            'level2'                     => trans('main.level2'),
            'level3'                     => trans('main.level3'),
            'level4'                     => trans('main.level4'),
            'tot'                        => trans('main.tot'),
            'pool'                       => trans('main.pool'),
            'story'                      => trans('main.mission_no_student'),
            'status'                     => trans('main.status'),
            'image'                      => trans('main.image'),
            'content'                    => trans('main.notes'),
        ];
    }
}
