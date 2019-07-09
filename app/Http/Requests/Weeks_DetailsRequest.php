<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Weeks_DetailsRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'week_id'     => 'required',
                    'class_id'    => 'required',
                    'startdate'    => 'required',
                    'enddate'    => 'required',
                    'status'     => 'required|in:active,inactive',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                  'week_id'     => 'required',
                  'class_id'    => 'required',
                  'startdate'    => 'required',
                  'enddate'    => 'required',
                  'status'     => 'required|in:active,inactive',
                ];
            }
            default:break;
        }
    }


    public function attributes()
    {
        return [
            'week_id'     => trans('main.week'),
            'class_id'    => trans('main.class'),            
            'startdate' => trans('main.start_date'),
            'enddate' => trans('main.end_date'),
            'status'     => trans('main.status'),
        ];
    }
}
