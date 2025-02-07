<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Qs;

class StudentRecordCreate extends FormRequest
{

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
            'name' => 'required|string|max:150',
            'adm_no' => 'sometimes|nullable|min:3|max:150|unique:student_records',
            'year_admitted' => 'required|string',
            'phone' => 'sometimes|nullable|string|min:6|max:20',
            'email' => 'sometimes|nullable|email|max:100|unique:users',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,gif,png,jpg|max:2048',
            'address' => 'string|max:120',
            'my_class_id' => 'required',
            'father' => 'sometimes|nullable',
            'mother' => 'sometimes|nullable',
            // 'my_parent_id' => 'sometimes|nullable',
        ];
    }

    public function attributes()
    {
        return  [
            'my_class_id' => 'Class',
            // 'my_parent_id' => 'Parent',
        ];
    }

    // protected function getValidatorInstance()
    // {
    //     $input = $this->all();

    //     $input['my_parent_id'] = $input['my_parent_id'] ? Qs::decodeHash($input['my_parent_id']) : NULL;

    //     $this->getInputSource()->replace($input);

    //     return parent::getValidatorInstance();
    // }
}
