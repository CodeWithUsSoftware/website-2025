<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    
    protected $fillable = [ 'id', 'name','slug', 'description', 'meta_title', 'meta_description',
    'meta_keywords', 'image_name'];

public function blogs()
{
    return $this->hasMany(Blog::class, 'category_id', 'id')->where('approved_id', '!=', 0)->where('is_deleted',false);
}
}
