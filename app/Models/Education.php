<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education'; // Explicit table name as "education" is plural-ish or non-standard in English singular form

    protected $fillable = ['degree', 'major', 'institution', 'university', 'duration', 'score', 'sort_order'];
}
