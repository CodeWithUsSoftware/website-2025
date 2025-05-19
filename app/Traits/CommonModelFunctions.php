<?php


namespace App\Traits;

trait CommonModelFunctions
{
    public function created_by(){
        return $this->belongsTo('App\Models\User', 'created_id', 'id');
    }

    public function updated_by(){
        return $this->belongsTo('App\Models\User', 'updated_id', 'id');
    }
}