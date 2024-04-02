<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $fillable = [
      'name_kz',
      'name_ru',
      'sort',
      'parent_id',
      'url'
    ];


    public function children()
    {
        return $this->hasMany(Navigation::class, 'parent_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'navigation_roles','navigation_id','role_id');
    }

}
