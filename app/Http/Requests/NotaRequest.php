<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'notas'=>'array',
            'notas.*.valor'=>'required_with:notas.*.id|nullable|numeric|between:0,10'
        ];
    }
    public function attributes()
    {
        return [
            'notas.*.valor'=>'valor da nota'
        ];
    }
}
