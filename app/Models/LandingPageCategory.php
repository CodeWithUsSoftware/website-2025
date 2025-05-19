<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\CommonModelFunctions;

class LandingPageCategory extends Model
{ use CommonModelFunctions;

    protected $fillable = ['id','title','slug','description','image','rss',
        'is_deleted','created_id','updated_id'];

    public function landing_pages()
    {
        return $this->hasMany(LandingPage::class)->where('is_deleted', 0);
    }
}
