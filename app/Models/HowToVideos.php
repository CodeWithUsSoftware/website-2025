<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HowToVideos extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'link', 'description', 'created_at', 'updated_at'];
}
