<?php

namespace App\Models\Qualification;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorQualification extends Model
{
    use HasFactory;

    protected $table = 'tutorqual';
    protected $primaryKey = 'qualID';
    public $timestamps = false;

    protected $fillable = [
        'TutorID',
        'paymentformid',
        'place',
        'form',
        'length',
        'start',
        'finish',
        'ResourceID',
        'docType',
        'country',
        'city',
        'tematika',
        'professionType',
        'placeOfFutherEducation',
        'paymentSum',
        'citizenshipId',
        'ppsadd',
        'filename'
    ];

    public function tutor(){
        return $this->hasOne(Tutor::class,'TutorID','TutorID');
    }

    public function formLabel(){
        return $this->hasOne(QualificationForm::class,'ID','form');
    }
}
