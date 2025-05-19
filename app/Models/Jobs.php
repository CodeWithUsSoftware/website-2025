<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
     protected $table = 'careers';

    public function location(){
        return $this->hasOne(Location::class,'id','location_id');
    }
}
