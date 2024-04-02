<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpvoTutorCafedra extends Model
{
    use HasFactory;

    protected $table = 'epvo_tutor_cafedra';
    public $timestamps = false;


    protected $guarded = [];
}
