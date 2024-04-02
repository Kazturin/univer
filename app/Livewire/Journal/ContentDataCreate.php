<?php

namespace App\Livewire\Journal;

use App\Livewire\Forms\Journal\ContentDataForm;
use App\Models\Journal\ContentData;
use App\Models\Journal\ContentType;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ContentDataCreate extends ModalComponent
{
    public ContentDataForm $form;
    public $contentTypes;
    public $contentId;
    public $week;
    public $editorContent='';
    public $test='sa';

    protected $listeners = ['editorContentUpdated'];

    public function mount(){

        $this->contentTypes = ContentType::get();

        $this->form->contentid = $this->contentId;
        $this->form->w = $this->week;
       // session()->flash('message', 'Post successfully updated.');
       //   $this->form->data = 'hhhh';
    }

    public function save()
    {
       // dd($this->form);
        $this->form->store();
        session()->flash('message', 'Енгізілді');
        $this->closeModal();
        $this->dispatch('saved')->to(ContentDataList::class);
    }


    public function render()
    {
        return view('livewire.journal.content-data-create');
    }

    function editorContentUpdated($value){
        $this->form->data = $value;
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

//    public static function attributes(): array{
//        return [
//          'size'=> '5xl'
//        ];
//    }
}
