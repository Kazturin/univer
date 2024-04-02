<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $connection = 'nitroapps';
    protected $primaryKey = 'contentid';
    public $timestamps = false;


    protected $fillable = [
      'tutorid',
      'contentname',
      'createdate',
      'lang',
      'tutors'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->createdate = date('Y-m-d H:i:s');
           // $model->modified = date('d-m-Y H:i:s');
        });

    }
}
