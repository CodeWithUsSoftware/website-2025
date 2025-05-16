<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = [
        'name', 'image_name','image_name_camps','student_portal_button_icons', 'free_session', 'description','is_for_second_brand', 'pricing', 'in_camps', 'sort','certificate_template',
        'password','compiler_lang','repl', 'school', 'show','reviews','faqs',
    ];
    public function teams(){
        return $this->belongsToMany(Team::class);
    }
}
