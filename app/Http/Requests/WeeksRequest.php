<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeeksRequest extends FormRequest
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
            'name'     => 'required',
            'slug'     => 'sometimes|nullable',
            'desc'     => 'nullable',
            'need'    => 'sometimes|nullable',
        ];
    }


    public function attributes()
    {
        return [
            'name'       => trans('main.name'),
            'slug'       => trans('main.slug'),
            'desc'       => trans('main.description'),
            'need'      => trans('main.need'),

        ];
    }
}
