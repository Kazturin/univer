<?php

namespace App\Livewire\Forms;

use App\Models\TutorCafedra;
use Livewire\Form;

class TutorCafedraForm extends Form
{
    public ?TutorCafedra $tutorCafedra;

    public $ID;
    public $TutorID ;
    public $cafedraid;
    public $position;
    public $rate;
    public $type;
    public $deleted;

    public function rules()
    {
        return [
            'TutorID' => 'unique:tutor_cafedra,TutorID,NULL,ID,type,'.$this->type,
            'cafedraid' => 'required',
            'position' => 'required',
            'rate' => 'required|numeric',
            'type' => 'unique:tutor_cafedra,type,NULL,ID,TutorID,'.$this->TutorID,
            'deleted' => 'required'
        ];
    }

//'field1' => 'unique:your_table,field1,NULL,id,field2,'.$request->input('field2'),
//'field2' => 'unique:your_table,field2,NULL,id,field1,'.$request->input('field1'),


    public function setTutorCafedra(TutorCafedra $tutorCafedra)
    {
        $this->ID = $tutorCafedra->ID;
        $this->TutorID = $tutorCafedra->TutorID;
        $this->cafedraid = $tutorCafedra->cafedraid;
        $this->position = $tutorCafedra->position;
        $this->rate = $tutorCafedra->rate;
        $this->type = $tutorCafedra->type;
        $this->deleted = $tutorCafedra->deleted;
    }

    public function store($tutorId)
    {
        $this->TutorID = $tutorId;

        $this->validate();

        TutorCafedra::create($this->only(['TutorID', 'cafedraid','position','rate','type','deleted']));

        $this->reset('cafedraid','position','rate','type','deleted');
    }

    public function update()
    {
        $this->tutorCafedra->update(
            $this->all()
        );
    }
}
