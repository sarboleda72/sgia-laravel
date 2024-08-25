<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            return [
                //
                'nombre_completo' => ['required', 'string', 'max:255'],
                'tipo_documento' => ['required', 'string', 'max:255'],
                'documento' => ['required', 'string', 'max:255','unique:'.User::class.',documento,'.$this->id],
                'ficha_id' => ['required', 'string', 'max:255'],
                'rol' => ['required', 'string', 'max:255'],
                'estado' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$this->id],
            ];
        }else{
            return [
                //
                'nombre_completo' => ['required', 'string', 'max:255'],
                'tipo_documento' => ['required', 'string', 'max:255'],
                'documento' => ['required', 'string', 'max:255','unique:'.User::class],
                'ficha_id' => ['required', 'string', 'max:255'],
                'rol' => ['required', 'string', 'max:255'],
                'estado' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ];
        }
    }
}
