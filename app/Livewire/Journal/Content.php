<?php

namespace App\Livewire\Journal;

use Livewire\Component;

class Content extends Component
{
    public $content;

    public $contentName;
    public $currentWeek=1;

//    public function mount(){
//
//    }

    public function render()
    {
        return view('livewire.journal.content');
    }

    public function selectWeek($week){
        $this->currentWeek = $week;
    }

//    public function createContentModal(){
//        $this->dispatch('create-content-modal');
//    }
}
