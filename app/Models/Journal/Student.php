<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'StudentID';

    public function group(){
        return $this->hasOne(Group::class,'groupID','groupID');
    }

    public function profession(){
        return $this->hasOne(Profession::class,'ProfessionID','ProfessionID');
    }

    public function journalDetails(){
        return $this->hasMany(JournalDetail::class,'c_stud','StudentID');
    }
}
