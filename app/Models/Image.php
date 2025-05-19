<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
     protected $fillable = ['id','title' ,'image_name', 'imagable_type', 'alt','type','notes', 'created_at', 'updated_at', 'created_id', 'updated_id','imagable_id'];

    public function imagable()
    {
        return $this->morphTo();
    }
}
