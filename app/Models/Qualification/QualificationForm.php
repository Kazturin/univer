<?php

namespace App\Models\Qualification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationForm extends Model
{
    use HasFactory;

    protected $table = 'qualificationforms';
    protected $primaryKey = 'ID';
    protected $timestamp = false;

}
