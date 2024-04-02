<?php

namespace App\Models\Journal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentData extends Model
{
    use HasFactory;

    protected $connection = 'nitroapps';
    protected $table = 'contentdata';
    protected $primaryKey = 'cdetid';
    public $timestamps = false;

    protected $fillable = [
         'contentid',
         'w',
         'type',
         'name',
         'subject',
         'data',
         'open',
         'pos',
    ];

    public function typeModel(){
        return $this->hasOne(ContentType::class,'contenttypeid','type');
    }
}
