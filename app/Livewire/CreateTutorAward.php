<?php

namespace App\Livewire;

use App\Livewire\Forms\TutorAwardForm;
use App\Models\Award;
use App\Models\AwardType;
use Livewire\Component;

class CreateTutorAward extends Component
{

    public TutorAwardForm $form;
    public $tutorId;
    public $types = [];
    public $awards = [];

    public function save()
    {
        $this->form->store($this->tutorId);
        session()->flash('success', 'Енгізілді');
        $this->dispatch('tutor-award-created');
    }

    public function mount(){
        $this->types = AwardType::get(['id','nameru']);
    }

    public function render()
    {
        if ($this->form->awardTypeId){
            $this->awards = Award::select('id','nameru')->where('awardTypeId',$this->form->awardTypeId)->get();
        }

        return view('livewire.create-tutor-award');
    }
}
