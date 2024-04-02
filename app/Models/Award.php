<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $temestamps  = false;

    protected $fillable = [
        'nameru',
        'namekz',
        'nameen',
        'awardTypeId',
        'receiveScholarshipInKz',
        'protected',
        'status_id'
    ];
}
