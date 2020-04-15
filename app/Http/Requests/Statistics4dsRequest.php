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
            'student_id'             => 'required|exists:students,id',
            'interact'               => 'nullable|integer',
            'datenow'                => 'required',
            'mission'                => 'required|integer',
            'decision'               => 'required|integer',
            'ob1'                    => 'required|integer',
            'ob2'                    => 'required|integer',
            'ob3'                    => 'required|integer',
            'ob4'                    => 'required|integer',
            'ob5'                    => 'required|integer',
            'ob6'                    => 'required|integer',
            'level1'                 => 'required|integer',
            'level2'                 => 'required|integer',
            'level3'                 => 'required|integer',
            'level4'                 => 'required|integer',
            'tot'                    => 'required|integer',
            'pool'                   => 'required|integer',
            'story'                  => 'required',
            'status'                 => 'required|in:active,inactive',
            'image'                  => 'sometimes|image',
            'content'                => 'required',
            'incarnation'            => 'required|integer',
            'steel'                  => 'required|integer',
            'misrepresentation'      => 'required|integer',
            'biblestory'             => 'required|integer',
            'lesson1'                => 'required|integer',
            'lesson2'                => 'required|integer',
            'lesson3'                => 'required|integer',
            'lesson4'                => 'required|integer',
            'lesson5'                => 'required|integer',
            'lesson6'                => 'required|integer',
            'lesson7'                => 'required|integer',
            'lesson8'                => 'required|integer',
            'lesson9'                => 'required|integer',
            'lesson10'               => 'required|integer',
            'friendmission'          => 'required|integer',
            'frienddecision'         => 'required|integer',
            'friendmissiontrain'     => 'required|integer',
            'loven'                  => 'required|integer',



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
            'incarnation'                => trans('main.incarnation'),
            'steel'                      => trans('main.steel'),
            'misrepresentation'          => trans('main.misrepresentation'),
            'biblestory'                 => trans('main.biblestory'),
            'lesson1'                    => trans('main.lesson1'),
            'lesson2'                    => trans('main.lesson2'),
            'lesson3'                    => trans('main.lesson3'),
            'lesson4'                    => trans('main.lesson4'),
            'lesson5'                    => trans('main.lesson5'),
            'lesson6'                    => trans('main.lesson6'),
            'lesson7'                    => trans('main.lesson7'),
            'lesson8'                    => trans('main.notes'),
            'lesson9'                    => trans('main.lesson9'),
            'lesson10'                   => trans('main.lesson10'),
            'friendmission'              => trans('main.friendmission'),
            'frienddecision'             => trans('main.frienddecision'),
            'friendmissiontrain'         => trans('main.friendmissiontrain'),
            'loven'                      => trans('main.loven'),

        ];
    }
}
