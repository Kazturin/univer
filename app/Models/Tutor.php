<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Journal\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Tutor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'TutorID';

    protected $fillable = [
        'lastname',
        'firstname',
        'patronymic',
        'adress',
        'iinplt',
        'living_adress',
        'lastnamePrevious',
        'BirthDate',
        'NationID',
        'citizenshipID',
        'Login',
        'Password',
        'SexID',
        'ismarried',
        'has_access',
        'deleted',
        'ictype',
        'icnumber',
        'icseries',
        'icdate',
        'icdepartment',
        'phone',
        'mobilePhone',
        'mail',
        'edubase',
        'rang',
        'ScientificFieldID',
        'ScientificDegreeID',
        'AcademicStatusID',
        'additionalInformation',
        'dljnEDO',
        'StartDate',
        'work_start_date',
        'maternity_leave',
        'on_foreign_trip',
        'timetable_description',
        'ftutorc'
    ];

    protected $attributes = [
        'del' => 0,
        'sovmestid' => 0,
        'telegramid' => 0,
        'updated' => 'same'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'model_has_roles','model_id','role_id');
    }

    public function cafedra(){
        return $this->hasOne(TutorCafedra::class,'tutorID','TutorID')->ofMany('cafedraid', 'max');
    }

    public function scopeSearch($query, $value){
        $query->where('firstname','like',"%{$value}%")->orWhere('lastname','like',"%{$value}%");
    }

    public function educations(){
        return $this->hasMany(TutorEducation::class,'tutorID');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'tutorsubject','TutorID','SubjectID','TutorID','SubjectID');
    }

    public function department(){
        return $this->hasOne(StructuralSubdivision::class,'id','departmentid');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
//    protected $casts = [
//        //  'email_verified_at' => 'datetime',
//        'password' => 'hashed',
//    ];
}
