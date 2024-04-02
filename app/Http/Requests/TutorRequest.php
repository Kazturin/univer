<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorRequest extends FormRequest
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
            'lastname' => 'required|string|max:128',
            'firstname' => 'required|string|max:128',
            'patronymic' => 'nullable|string|max:128',
            'adress' => 'nullable|string',
            'iinplt' => 'nullable|string|max:32',
            'living_adress' => 'nullable|string|max:255',
            'lastnamePrevious' => 'nullable|string|max:255',
            'BirthDate' => 'nullable|string',
            'NationID' => 'nullable|integer',
            'citizenshipID' => 'required|integer',
            'SexID' => 'nullable|integer',
            'ismarried' => 'nullable|integer',
            'has_access' => 'required|boolean',
            'deleted' => 'required|boolean',
            'ictype' => 'nullable|integer',
            'icnumber' => 'nullable|string',
            'icseries' => 'nullable|string',
            'icdate' => 'nullable|date',
            'icdepartment' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'mobilePhone' => 'nullable|string|max:16',
            'mail' => 'nullable|string',
            'edubase' => 'nullable|string',
            'rang' => 'nullable|string',
            'ScientificFieldID' => 'nullable|integer',
            'ScientificDegreeID' => 'nullable|integer',
            'AcademicStatusID' => 'nullable|integer',
            'additionalInformation' => 'nullable|string|max:255',
            'dljnEDO' => 'nullable|string|max:50',
            'StartDate' => 'nullable|date',
            'work_start_date' => 'nullable|date',
            'teaching_experience_start_date' => 'nullable|date',
            'maternity_leave' => 'nullable|boolean',
            'on_foreign_trip' => 'nullable|boolean',
            'ftutor' => 'nullable|boolean',
            'timetable_description' => 'nullable|string',
            'roles' => 'nullable|array'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'has_access' => $this->has('has_access'),
                'deleted' => $this->has('deleted'),
                'maternity_leave' => $this->has('maternity_leave'),
                'on_foreign_trip' => $this->has('on_foreign_trip'),
                'ftutor' => $this->has('ftutor')
            ]);
    }
}
