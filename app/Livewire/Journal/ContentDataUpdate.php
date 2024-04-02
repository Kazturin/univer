<?php

namespace App\Livewire\Journal;

use App\Livewire\Forms\Journal\ContentDataForm;
use App\Models\Journal\ContentData;
use App\Models\Journal\ContentType;
use Livewire\Component;

class ContentDataUpdate extends Component
{
    public ContentDataForm $form;
    public $contentTypes;

    protected $listeners = ['contentChanged'];

    public function mount(ContentData $contentData)
    {
        $this->form->setContentData($contentData);
        $this->contentTypes = ContentType::get();
    }

    public function save()
    {
        $this->form->update();
        session()->flash('success', 'Өзгертілді');
        $this->dispatch('saved');
      //  $this->dispatch('saved')->to(ContentDataList::class);
    }

    public function render()
    {
        return view('livewire.journal.content-data-update');
    }

    function contentChanged($value){
      //  dd($value);
        $this->form->data = $value;
    }
}
