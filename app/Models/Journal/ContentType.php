<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;

    protected $connection = 'nitroapps';
    protected $table = 'contenttype';
    protected $primaryKey = 'contenttypeid';
    public $timestamps = false;
}
