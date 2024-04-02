<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    use HasFactory;

    protected $connection = 'journal_mysql';
    protected $table = 'jornal_det';
    protected $primaryKey = 'c_jorn_det';
    public $timestamps = false;

    protected $fillable = [
        'grade'
    ];
}
