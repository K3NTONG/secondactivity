<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $primaryKey = 'id';
    public $timestamps = true;

    public function employees(){
        return $this->hasMany('App\Employee');
    }
}
