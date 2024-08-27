<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tool;

class ToolRequest extends FormRequest
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
                'nombre' => ['required', 'string', 'max:255'],
                'marca' => ['required', 'string', 'max:255'],
                'cantidad' => ['required', 'integer'],
                'precio' => ['required', 'integer'],
                'estado' => ['required', 'string', 'max:255'],
            ];
        }

        return [
            //
            'nombre' => ['required', 'string', 'max:255'],
            'marca' => ['required', 'string', 'max:255'],
            'cantidad' => ['required', 'integer'],
            'precio' => ['required', 'integer'],
            'estado' => ['required', 'string', 'max:255'],
        ];
    }
}
