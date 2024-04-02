<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'nameru' => 'required|string',
            'namekz' => 'required|string',
            'nameen' => 'nullable|string',
            'subdivision_type' => 'nullable|integer',
            'faculty_cafedra_id' => 'nullable|string',
            'dean' => 'required|integer',
            'pre' => 'required|integer',
            'deleted' => 'nullable|integer',
            'pos' => 'nullable|integer'
        ];
    }
}
