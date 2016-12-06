<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = ['login','password'];

    public function user_types(){
        return $this->belongsTo('App\Models\User_Type','user_type_id','id');
    }
}