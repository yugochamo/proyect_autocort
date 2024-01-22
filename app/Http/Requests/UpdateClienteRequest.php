<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
        $client = $this->route('client');
        return [
            'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'cedula' => 'required|string|max:50|unique:clients,cedula',
                'email' => 'required|email',
                'telefono' => 'required|string|max:50',
                'dirección' => 'required|string|max:50',
            //
        ];
    }
}
