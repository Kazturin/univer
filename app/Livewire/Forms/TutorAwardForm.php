<?php

namespace App\Livewire\Forms;

use App\Models\TutorAward;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Features\SupportValidation\BaseValidate;


class TutorAwardForm extends Form
{
    #[Validate('nullable')]
    public $tutorId;

    #[Validate('required')]
    public $awardTypeId;

    #[Validate('required')]
    public $honoraryTitleId;

    #[Validate('required')]
    public $awardDate;

    public function store($tutorId)
    {
        $this->tutorId = $tutorId;

        $this->validate();

        TutorAward::create($this->only(['tutorId','awardTypeId','honoraryTitleId','awardDate']));

        $this->reset('tutorId','awardTypeId','honoraryTitleId','awardDate');
    }
}
