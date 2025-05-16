<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSpotLight extends Model
{
     protected $fillable = [
        'id', 'name', 'image_name', 'spot_light_month','spotlight_month', 'homepage_carousel' , 'comment','link', 'is_deleted'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class)->where('topics.is_deleted',false)->orderBy('id', 'desc');
    }
}
