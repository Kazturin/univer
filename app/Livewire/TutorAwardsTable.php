<?php

namespace App\Livewire;

use App\Models\TutorAward;
use Livewire\Attributes\On;
use Livewire\Component;

class TutorAwardsTable extends Component
{
    public $tutorId;
    public $awards = [];

    public function mount(){
         $this->awards = TutorAward::where('tutorId',$this->tutorId)->get();
    }

    #[On('tutor-award-created')]
    public function updatePostList()
    {
        $this->awards = TutorAward::where('tutorId',$this->tutorId)->get();
    }

    public function render()
    {
        return view('livewire.tutor-awards-table');
    }
}
