<?php

namespace App\Livewire\Journal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ContentDataShow extends ModalComponent
{
    public $currentContent;

    public function mount($currentContent){
        $this->currentContent = $currentContent;
    }

    public function render()
    {
        return view('livewire.journal.content-data-show');
    }
}
