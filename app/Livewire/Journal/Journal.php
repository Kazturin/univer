<?php

namespace App\Livewire\Journal;

use App\Models\Journal\JournalDetail;
use App\Models\Journal\Student;
use Livewire\Component;

class Journal extends Component
{
    public $groups;
    public $currentGroup = null;
    public $journal;
    public $journal_detail;
    public $current_journal_detail;
    public $current_week = 5;
    public $studentsIDs = null;
    public $students;

    public function mount(){
        if ($this->groups){
            $this->currentGroup = $this->groups[0];

            $this->journal = \App\Models\Journal\Journal::with(['detail' => function ($query) {
                $query->where('type','<>', 4);
            }])
            ->where([
                'c_disc'=> $this->currentGroup->StudyGroupID,
                'semestr' => '022023',
                's_ldiv' => 2,
                'reg' => 1
            ])->first();

        }
    }

    public function render()
    {
        $current_week = $this->current_week;
        $this->current_journal_detail = $this->journal->detail->filter(function ($value) use ($current_week){
            return $value->week === $current_week && $value->status===0;
        });

        //    dd($this->current_journal_detail);
        $this->students = $this->journal->detail->filter(function ($value) use ($current_week){
            return $value->week == $current_week && $value->status<>0;
        })->pluck('c_stud')->unique()->toArray();

        $journal_id = $this->journal->c_jorn;

        $this->students = Student::select('StudentID','lastname','firstname','patronymic')->whereIn('StudentID',$this->students)
            ->with(['journalDetails' => function ($query)use($journal_id,$current_week){
                $query->where('type','<>', 4)->where(['week'=>$current_week,'c_jorn'=>$journal_id]);
            }])->where('groupID',$this->currentGroup->groupID)->get();

        return view('livewire.journal.journal');
    }

    public function selectGroup($index){
        $this->currentGroup = $this->groups[$index];
    }
    public function selectWeek($week){
        $this->current_week = $week;
//        $current_week = $this->current_week;
//        $this->current_journal_detail = $this->journal_detail->filter(function ($value) use($current_week) {
//            //  dd($value);
//            return $value->week === $current_week && $value->status===0;
//        });
    }
    public function test($studentId){
        $jour_det = JournalDetail::where('week','<=',$this->current_week)->whereIn('week',[1,2,3,4,5,6,7])
            ->where([
                'c_jorn'=>$this->journal->c_jorn,
                'c_stud'=>$studentId
            ])->get();

     //   dd($this->current_week.' '.$this->journal->c_jorn.' '.$studentId);
        $student = Student::where('StudentID',$studentId)->first();
        $sumMax = $jour_det->sum('max');
        $sumGrade = $jour_det->sum('grade');
      //  dd($sumGrade);
        $countGrade = $jour_det->where('grade','>',0)->count('c_jorn_det');
        $countMax = $sumMax/100;

     //   dd($sumGrade);
        //    dd($countMax.' '.$countGrade);

        $countposeshmax = $jour_det->where('lang',0)->where('type','<',4)->count('c_jorn_det');
        $countPoseshStud = $jour_det->where('lang',0)->where('type','<',4)->where('posesh','>',0)->count('c_jorn_det');
      //  dd($countposeshmax.''. $countPoseshStud);
//dd($sumGrade);

//        dd($countMax);
//
//        dd($sumGrade.'/'.$countGrade);

        $r = $countGrade >= $countMax ? round($sumGrade/1) : round($sumGrade/1);

        if ($countMax==0) {
            $r = round(($countPoseshStud/$countposeshmax)*100);
        } else {
            if ($student->StudyFormID==15 || $student->StudyFormID==16 || $student->StudyFormID==17 || $student->StudyFormID==20) {
                return $r<0 ? $r : 0;
            } else {
               $r = round($r-10+($countPoseshStud/$countposeshmax)*10);
            }
        }
        return $r>0? $r : 0;
       // dd($countGrade);

     //   dd($jour_det->sum($sumGrade));
    }
    public function setGrade($c_jorn_det,$grade)
    {
        $journalDetail = JournalDetail::find($c_jorn_det);

        $journalDetail->grade = $grade;

        $journalDetail->save();
    }
}
