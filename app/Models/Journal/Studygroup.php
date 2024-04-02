<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studygroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'StudyGroupID';

    public function tutorsubject (){
        return $this->hasOne(TutorSubject::class,'TutorSubjectID','tutorSubjectID');
    }

    public function subject(){
        return $this->hasOne(Subject::class,'SubjectID','subjectid');
    }

    public function students(){
        return $this->belongsToMany(Student::class,'studentstudygroup','studyGroupID','StudentID','StudyGroupID','StudentID');
    }
}
