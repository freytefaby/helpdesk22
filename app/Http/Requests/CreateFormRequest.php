<?php

namespace hhfarm\Http\Requests;

use hhfarm\Http\Requests\Request;

class CreateFormRequest extends Request
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
            'categoria'=>'required',
			'tipo'=>'required',
			'titulo'=>'required',
			'descripcion'=>'required',
			'acceso'=>'required',
			'autor'=>'required',
			
			 
        ];
    }
}
