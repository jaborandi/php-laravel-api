<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class MunicipesAddRequest extends FormRequest
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
            
				"cpf" => "nullable|string",
				"nome" => "required|string",
				"endereco" => "nullable|string",
				"telefone" => "nullable|string",
				"email" => "nullable|email",
				"data_nasc" => "nullable|date",
				"estado_civil" => "nullable|string",
				"nis" => "nullable",
				"carac_ind" => "nullable|string",
				"carac_fam" => "nullable|string",
				"inss" => "nullable",
				"ocupacao" => "nullable|string",
				"renda" => "nullable|string",
				"despesas" => "nullable|string",
				"inserido_por" => "nullable|string",
				"inserido_em" => "nullable|date",
				"atualizado_em" => "nullable|date",
				"observacoes" => "nullable|string",
				"numero" => "nullable|string",
				"tipo_end" => "nullable|string",
				"rg" => "nullable|string",
				"endereco_completo" => "nullable|string",
				"atualizado_por" => "nullable|string",
				"idade" => "nullable|string",
				"apagado_em" => "nullable|date",
				"apagado" => "nullable|string",
				"pai" => "nullable",
				"mae" => "nullable",
				"deficiencia" => "nullable",
				"religiao" => "nullable",
				"alerta_saude" => "nullable",
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
