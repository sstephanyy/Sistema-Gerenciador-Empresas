<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarEmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        $empresaId = $this->empresa->id;

    return [
        'nome' => ['required', 'min:4', 'max:35'],
        'cnpj' => [
            'required',
            'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/',
            Rule::unique('empresas')->ignore($empresaId),
        ],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('empresas')->ignore($empresaId),
        ],
        'telefone' => ['required', 'regex:/^\(\d{2}\) \d{4,5}-\d{4}$/'], 
        'estado' => ['required', 'string', 'min:3', 'max:40'],
        'industria' => ['required', 'string', 'max:55']
    ];
    }
}
