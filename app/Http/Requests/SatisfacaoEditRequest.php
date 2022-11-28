<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class SatisfacaoEditRequest extends FormRequest
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
            
				"atend_recepcao" => "nullable",
				"sala_triagem" => "nullable",
				"atend_enfermagem" => "nullable",
				"tempo_atendido" => "nullable",
				"limpeza" => "nullable",
				"gentileza" => "nullable",
				"acomodacoes" => "nullable",
				"frequencia" => "nullable",
				"disposicao_equipe" => "nullable",
				"extra" => "nullable",
        ];
    }

	public function messages()
    {
        return [
            //using laravel default validation messages
        ];
    }

	/**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
