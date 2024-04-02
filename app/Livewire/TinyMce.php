<?php

namespace App\Livewire;

use Livewire\Component;

class TinyMce extends Component
{
    public $content='';
    public $id;

    public function render()
    {
        return view('livewire.tiny-mce');
    }

    public function updatedContent($value)
    {
      //  dd($value);
        $this->dispatch('contentChanged', $value);
    }
}
