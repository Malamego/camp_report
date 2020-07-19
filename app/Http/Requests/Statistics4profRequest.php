<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Statistics4profRequest extends FormRequest
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
            'name'                   => 'required',
            'image'                  => 'sometimes|image',
            'content'                => 'nullable',
            'datenow'                => 'required',
            'week_id'                => 'required|exists:weeks,id',
            'student_id'             => 'required|exists:students,id',
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
            'friendmission'          => 'required|integer',
            'frienddecision'         => 'required|integer',
            'friendfollow'           => 'required|integer',
            'talmazagroup'           => 'required|integer',
            'missionhours'           => 'required|integer',
            'status'                 => 'required|in:active,inactive',
            'jesustime'              => 'required|integer',
            'loven'                  => 'required|integer',
            'traininteract'          => 'required|in:absence,presence',
            'church'                 => 'required',

        ];
    }


    public function attributes()
    {
        return [
            'name'                      => trans('main.name'),
            'week_id'                    => trans('main.week'),
            'student_id'                 => trans('main.student'),
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
            'status'                     => trans('main.status'),
            'image'                      => trans('main.image'),
            'content'                    => trans('main.notes'),
            'friendmission'              => trans('main.friendmission'),
            'frienddecision'             => trans('main.frienddecision'),
            'friendfollow'               => trans('main.friendfollow'),
            'loven'                      => trans('main.loven'),
            'traininteract'              => trans('main.traininteract'),
            'church'                     => trans('main.church'),

        ];
    }
}
