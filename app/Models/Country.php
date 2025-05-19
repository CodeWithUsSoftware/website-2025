<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
   protected $table = 'countries';
    
        protected $fillable = ['country_name','calling_code','character_code','is_for_second_brand'];
}
