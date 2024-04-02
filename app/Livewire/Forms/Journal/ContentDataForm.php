<?php

namespace App\Livewire\Forms\Journal;

use App\Models\Journal\ContentData;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContentDataForm extends Form
{

    public ?ContentData $contentData;

    #[Validate('required')]
    public $contentid;

    #[Validate('required')]
    public $w;

    #[Validate('required')]
    public $type=11;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|max:1024')]
    public $subject;

    #[Validate('required')]
    public $data;

    #[Validate('numeric')]
    public $open = 1;

    #[Validate('required')]
    public $pos = 1;

    public function setContentData(ContentData $contentData)
    {
        $this->contentData = $contentData;
        $this->contentid = $contentData->contentid;
        $this->w =  $contentData->w;
        $this->type =  $contentData->type;
        $this->name =  $contentData->name;
        $this->subject =  $contentData->subject;
        $this->data =  $contentData->data;
    }

    public function store()
    {
        $this->validate();

        ContentData::create($this->all());

        $this->reset('name','type','subject','data');
    }

    public function update()
    {
       // $this->validate();

        $this->contentData->update(
            $this->all()
        );
      // $this->reset();
    }

}
