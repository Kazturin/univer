<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentStudyGroup extends Model
{
    use HasFactory;

    protected $table = 'studentstudygroup';

    protected $primaryKey = null;
    public $incrementing = false;

    public function students(){
        return $this->belongsToMany(Student::class,'','StudentID');
    }
}
