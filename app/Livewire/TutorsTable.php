<?php

namespace App\Livewire;

use App\Models\CafedraInfo;
use App\Models\Faculties;
use App\Models\StructuralSubdivision;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class TutorsTable extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = '';
    public $facultyId = null;
    public $cafedraId = null;
    public $faculties = null;
    public $status = false;
    public $cafedras = [];
    public $departmentid = null;
    public $departments = null;

    public function mount(){
        $this->faculties = Faculties::select('FacultyID','facultyNameKZ')->get();
        $this->departments  = StructuralSubdivision::where('subdivision_type',1)->get();
    }

    public function render()
    {
        if ($this->facultyId){
            $this->cafedras = CafedraInfo::select('cafedraID','cafedraNameKZ')->where('FacultyID',$this->facultyId)->get();
        }

        return view('livewire.tutors-table',[
            'teachers' => Tutor::select('TutorID','firstname','lastname','patronymic','StartDate')
                ->search($this->search)
                ->where('deleted', $this->status)
                ->when($this->facultyId, function ($query) {
                    $query->whereHas('cafedra.cafedraInfo', function ($query) {
                            $query->where('FacultyID', $this->facultyId);
                        if ($this->cafedraId){
                            $query->where('cafedraID', $this->cafedraId);
                        }
                    });
                })
                ->when($this->departmentid, function ($query) {
                        $query->where('departmentid', $this->departmentid);
                })
                ->paginate($this->perPage)
        ]);
    }

//    public function setPage($url)
//    {
//        $this->currentPage = explode('page=', $url)[1];
//        Paginator::currentPageResolver(function(){
//            return $this->currentPage;
//        });
//    }
   /* public function boot(): void
    {
        Paginator::useBootstrapFive();
    }*/
}
