<?php

namespace App\Models;

use App\Traits\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   use Search;
    
    protected $fillable = [ 'id', 'name','slug', 'category_id', 'description','type','external_link', 'meta_title', 'meta_description',
    'meta_keywords', 'author', 'image_name', 'created_id', 'approved_id', 'approved_at'];

  
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id')
            ->withCount('blogs')
            ->where('is_deleted', 0);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->where('is_deleted', 0);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_id', 'id');
    }

    public function scopeApproved($query)
    {
        $query->where('approved_id','!=', 0);
    }

    public function blog_locations()
    {
        return $this->belongsToMany(BlogLocation::class);
    }
}
