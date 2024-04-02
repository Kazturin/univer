<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafedraInfo extends Model
{
    use HasFactory;

    protected $table = 'cafedras';
    protected $primaryKey = 'cafedraID';

    public function faculty(){
        return $this->belongsTo(Faculties::class,'FacultyID','FacultyID');
    }
}
