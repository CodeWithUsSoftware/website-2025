<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLocation extends Model
{
      protected $fillable = [ 'id', 'name','slug'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
