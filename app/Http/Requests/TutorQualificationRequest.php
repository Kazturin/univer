<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorQualificationRequest extends FormRequest
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
            'TutorID' => 'required',
            'paymentformid' => 'required',
            'place' => 'nullable|string|max:255',
            'form' => 'nullable|string',
            'length' => 'nullable|string',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
            'ResourceID' => 'nullable|numeric',
            'docType' => 'nullable|numeric',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'tematika' => 'nullable|string',
            'professionType' => 'nullable|numeric',
            'placeOfFutherEducation' => 'nullable|numeric',
            'paymentSum' => 'nullable|numeric',
            'citizenshipId' => 'nullable|numeric',
            'ppsadd' => 'nullable|boolean',
            'filename' => 'nullable|string|max:25'
        ];
    }
}
