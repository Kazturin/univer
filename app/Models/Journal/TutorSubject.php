<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorSubject extends Model
{
    use HasFactory;

    protected $table = 'tutorsubject';
    protected $primaryKey = 'TutorSubjectID';

    public function subjects(){
        return $this->hasMany(Subject::class,'SubjectID','SubjectID');
    }

    public function studyGroups(){
        return $this->hasMAny(Studygroup::class,'tutorSubjectID','TutorSubjectID');
    }
}
