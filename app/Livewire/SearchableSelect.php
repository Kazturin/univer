<?php

namespace App\Livewire;

use Livewire\Component;

class SearchableSelect extends Component
{
    public $items;
    public $optionKey;
    public $optionValue;
    public $fieldName;
    public $state;
    public $filter;
    public $list;
    public $selectedkey;
    public $selectedLabel;
    public $multiple = false;

    public function mount($items,$optionKey,$optionValue,$fieldName){
        $this->list = $items;
        $this->items = $items;
        $this->optionKey = $optionKey;
        $this->optionValue = $optionValue;
        $this->fieldName = $fieldName;
        $this->state = false;
        $this->filter = '';
        $this->selectedkey = '';
        $this->selectedLabel = 'Выбирать';
    }

    public function render()
    {
        return view('livewire.searchable-select');
    }

    public function toggle(){
        $this->state = !$this->state;
        $this->filter = '';
    }
    public function close(){
        $this->state = false;
    }
    public function select($key,$value){
        if($this->selectedkey == $key){
            $this->selectedLabel = null;
            $this->selectedkey = null;
        }else{
            $this->selectedLabel = $value;
            $this->selectedkey = $key;
            $this->state = false;
        }
      //  dd($this->selectedlabel);
    }
    public function isselected($key){
        return $this->selectedkey == $key;
    }
    public function getlist(){
    if($this->filter == ''){
        return $this->items;
    }
//        $filtered = array_filter($this->items, function ($item) {
//            return stripos($item[$this->optionValue], $this->filter) !== false;
//        });

        $filtered = $this->items->filter(function ($item) {
            return mb_strpos($item[$this->optionValue], $this->filter) !== false;
        });
        return $filtered;
   }
}
