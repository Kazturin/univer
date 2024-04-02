<?php

namespace App\Livewire\Journal;

use Livewire\Attributes\On;
use Livewire\Component;
use \App\Models\Journal\ContentData;

class ContentDataList extends Component
{
    public $contentId = null;
    public $week;
    public $contentData;
    public $currentContent = null;

    #[On('saved')]
    public function refresh()
    {
        $this->currentContent = null;
    }

    public function mount($contentId,$week)
    {
        $this->contentId = $contentId;
        $this->week = $week;
    }

    public function render()
    {
        $this->contentData = ContentData::with('typeModel')
            ->where([
                'contentid'=>$this->contentId,
                'w' => $this->week
            ])->get();

        return view('livewire.journal.content-data-list');
    }

    public function showContent($id){

       // dd($id);
       $this->currentContent = $this->contentData->first(function (ContentData $value) use($id){
            return $value->cdetid == $id;
        });

       $this->dispatch('openModal','journal.content-data-show',[ $this->currentContent]);
    }
    public function editContent($id){

        // dd($id);
        $this->currentContent = $this->contentData->first(function (ContentData $value) use($id){
            return $value->cdetid == $id;
        });
        $this->dispatch('edit-content-modal');
    }

    public function deleteContent($id){
        ContentData::where('cdetid', $id)->delete();
        $this->refresh();
    }
}
