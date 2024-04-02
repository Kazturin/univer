<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'structural_subdivision';

    protected $fillable = [
      'nameru',
      'namekz',
      'nameen',
      'subdivision_type',
      'faculty_cafedra_id',
      'dean',
      'pre',
      'deleted',
      'pos'
    ];

    protected $attributes = [
        'deleted' => 0,
        'pos' => 0,
    ];

    public $timestamps = false;

    public function director(){
       return $this->hasOne(User::class,'TutorID','dean');
    }
}
