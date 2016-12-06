<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Type extends Model
{
    protected $table = 'user_type';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany('App\Models\User','user_type_id','id');
    }
}