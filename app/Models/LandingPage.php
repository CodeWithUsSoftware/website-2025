<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\CommonModelFunctions;

class LandingPage extends Model
{
    
    use CommonModelFunctions;

    protected $fillable = ['id','title','slug','short_description','long_description', 'sort', 'show_menu', 'landing_page_category_id',
        'video','image','rss','is_deleted','created_id','updated_id'];

    public function category()
    {
        return $this->belongsTo(LandingPageCategory::class, 'landing_page_category_id', 'id')
            ->where('is_deleted', 0);
    }
}
