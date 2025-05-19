<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolPage extends Model
{
    protected $table="school_pages";

    public function created_by()
    {
        return $this->belongsTo(User::class,'created_id','id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class,'updated_id','id');
    }
}
