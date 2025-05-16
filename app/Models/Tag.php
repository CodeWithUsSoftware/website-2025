<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     protected $fillable = [ 'id', 'name','slug', 'description', 'meta_title', 'meta_description',
        'meta_keywords', 'type'];

    public function scopeIsActive($query)
    {
        $query->where('status','active');
    }
    
    public function leads()
    {
        return $this->morphedByMany('App\Lead', 'taggable');
    }

    public function blogs()
    {
        return $this->morphedByMany('App\Models\Blog', 'taggable')->where('approved_id', '!=', 0)->where('is_deleted',false);
    }

    public function events()
    {
        return $this->morphedByMany('App\Event', 'taggable');
    }

    public function studentSpotligts()
    {
        return $this->morphedByMany('App\StudentSpotlight', 'taggable')->where('is_deleted',  0);
    }

    public function courses(){
        return $this->morphedByMany('App\Course', 'taggable')->where('is_deleted',  0);
    }

    public function referrals()
    {
        return $this->morphedByMany('App\Referral', 'taggable')->where('is_deleted', 0);
    }
}
