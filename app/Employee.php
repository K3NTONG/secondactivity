<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $primaryKey = 'id';
    public $timestamps = true;

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
