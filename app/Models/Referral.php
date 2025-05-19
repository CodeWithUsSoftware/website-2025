<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    

    protected $fillable = ['name', 'email', 'country_id', 'phone_number', 'code', 'created_id', 'updated_id', 'layout',
        'heading', 'heading_description', 'text_section1', 'text_section2', 'rss' ,  'meta_title', 'meta_description', 'meta_keywords'];

    public function students()
    {
        return $this->belongsToMany(User::class)->withPivot('task_class_id', 'value');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
