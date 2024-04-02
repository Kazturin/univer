<?php

namespace App\Livewire\Journal;


use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContentWeek extends Component
{
    public $contentWeek=null;
    public $week;
    public $contentid;
    public $name;
    public $data;

//    #[Validate('required|unique:tutor_cafedra,TutorID,NULL,ID,type,'.$this->type)]
//    public $name='';
//    #[Validate('required')]
//    public $data='';

    public function mount($week,$contentId){
        $this->contentWeek = \App\Models\Journal\ContentWeek::where([
            'contentid' => $contentId,
            'week' => $week
        ])->first();
        if ($this->contentWeek){
            $this->name = $this->contentWeek->name;
            $this->data = $this->contentWeek->data;
        }
        $this->week = $week;
        $this->contentid = $contentId;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'data' => 'required',
            'week' => [
                Rule::when(
                    !$this->contentWeek,
                    'unique:nitroapps.contentweek,week,NULL,c_week,contentid,'.$this->contentid
                ),
            ],
            'contentid' => [
                Rule::when(
                    !$this->contentWeek,
                    'unique:nitroapps.contentweek,week,NULL,c_week,week,'.$this->week
                ),
                ],
        ];
    }


    public function render()
    {
        return view('livewire.journal.content-week');
    }

    public function save(){
        $this->validate();
        if ($this->contentWeek){
            $this->contentWeek->update($this->only(['contentid', 'week','name','data']));
        }
        else{
            \App\Models\Journal\ContentWeek::create($this->only(['contentid', 'week','name','data']));
        }
        session()->flash('message', 'Цели и задачи сохранен');
    }
}
