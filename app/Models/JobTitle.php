<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $table = 'tutor_positions';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'NameRU',
        'NameKZ',
        'NameEN',
        'roleType',
    ];

    public $timestamps = false;
}
