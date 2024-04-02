<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorCafedra extends Model
{
    use HasFactory;

    protected $table = 'tutor_cafedra';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
      'TutorID',
      'cafedraid',
      'position',
      'rate',
      'type',
      'deleted',
      'modified',
      'et_by_agreement',
    ];

    protected $attributes = [
      'et_by_agreement' => 0
    ];


    public function cafedraInfo(){
        return $this->hasOne(CafedraInfo::class,'cafedraID','cafedraid');
    }

    public static function boot()
    {
        parent::boot();

//        self::creating(function($model){
//            $model->modified = '10.11.2023 17:32:51';
//           // $model->modified = date('d-m-Y H:i:s');
//        });
//
//        self::updating(function($model){
//            $model->modified = date('Y:m-d H:i:s');
//        });
    }

}
