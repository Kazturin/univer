<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentWeek extends Model
{
    use HasFactory;

    protected $connection = 'nitroapps';
    protected $table = 'contentweek';
    protected $primaryKey = 'c_week';
    public $timestamps = false;

    protected $fillable = [
      'c_week',
      'contentid',
      'week',
      'name',
      'data'
    ];
}
