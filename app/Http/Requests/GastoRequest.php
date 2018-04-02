<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GastoRequest extends FormRequest
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
            'descripcion' 			=> 'required|max:150',
			'monto' 				=> 'required|numeric',
			'numero' 				=> 'required|max:20',
			'fecha' 				=> 'required|date|before_or_equal:today',
			'tipo' 					=> 'required|in:B,S',
			'meta_id' 				=> 'required|integer',
			'tipo_documento_id'		=> 'required|integer',
        ];
    }
}
