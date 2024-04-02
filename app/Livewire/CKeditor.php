<?php

namespace App\Livewire;

use Livewire\Component;

class CKeditor extends Component
{
    public $content;
    public $id;

    public function render()
    {
        return view('livewire.c-keditor');
    }

    public function updatedContent($value)
    {
        //  dd($value);
        $this->dispatch('contentChanged', $value);
    }

}
