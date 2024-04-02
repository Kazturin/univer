<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $connection = 'journal_mysql';
    protected $table = 'jornal';
    protected $primaryKey = 'c_jorn';

    public function detail(){
        return $this->hasMany(JournalDetail::class,'c_jorn','c_jorn');
    }
}
