<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = ['id', 'user_id', 'lecture_section_id', 'save_as', 'language', 'code', 'is_deleted', 'created_id', 'updated_id',
    'projectable_type', 'projectable_id'];
}
