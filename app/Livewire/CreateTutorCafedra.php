<?php

namespace App\Livewire;

use App\Livewire\Forms\TutorCafedraForm;
use App\Models\CafedraInfo;
use App\Models\JobTitle;
use Livewire\Component;

class CreateTutorCafedra extends Component
{

    public TutorCafedraForm $form;
    public $tutorId;
    public $cafedras = [];
    public $jobTitles = [];

    public function save()
    {
        $this->form->store($this->tutorId);
        session()->flash('success', 'Енгізілді');
    }

    public function mount(){
        $this->cafedras = CafedraInfo::select('cafedraID','cafedraNameKZ')->get();
        $this->jobTitles = JobTitle::where('roleType',1)->get();
    }

    public function render()
    {
        return view('livewire.create-tutor-cafedra');
    }
}
