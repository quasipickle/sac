<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PresentationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: Change this value after adding roles
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
            'professor_name' => 'required',
            'student_name' => 'required',
            'course' => 'required',
            'title' => 'required',
            'type' => 'required',
        ];
    }
}
