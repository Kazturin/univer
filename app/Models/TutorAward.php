<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAward extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'awardTypeId',
        'honoraryTitleId',
        'countryId',
        'cityId',
        'charterName',
        'organizationName',
        'result',
        'awardDate',
        'tutorId',
        'name'
    ];
}
