<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'SubjectID';

//    public function tutorSubject(){
//        return $this->hasOne(TutorSubject::class,'');
//    }
}
