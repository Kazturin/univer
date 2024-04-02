<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavigationRequest extends FormRequest
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
        return [
            'name_kz' => 'required|string',
            'name_ru' => 'required|string',
            'sort' => 'required|numeric',
            'url' => 'nullable|string',
            'parent_id' => 'nullable|numeric',
            'roles' => 'nullable|array'
        ];
    }
}
