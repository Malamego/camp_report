<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the student is authorized to make this request.
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
        $return = [
            'name'     => 'required',
            'email'    => 'required|unique:students',
            'phone'    => 'required|unique:students',
            'class_id'  => 'required|exists:class_models,id',
            'user_id'  => 'required|exists:users,id',
            'imei'    => 'required|min:14',
            // 'type'     => 'required|in:student,admin',
            'image'     => 'sometimes|image',
        ];

        if (in_array($this->method(), ['POST', 'PATCH'])) {
            $return['email'] = 'required|unique:students,phone,'.$this->route()->parameter('student').',id';
            $return['phone'] = 'required|unique:students,phone,'.$this->route()->parameter('student').',id';
        }

        return $return;
    }


    public function attributes()
    {
        return [
            'name'     => trans('main.name'),
            'email'    => trans('main.email'),
            // 'type'     => trans('main.type'),
            'class_id'     => trans('main.class_id'),
            'imei'     => trans('main.imei'),
        ];
    }
}
