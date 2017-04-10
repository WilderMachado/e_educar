<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'matricula' => 'required|max:6',
            'nome' => 'required|min:5',
            'email'=>'required|email',
            'curriculo' => 'nullable|url'
        ];
    }
}
