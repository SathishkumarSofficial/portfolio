<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['company', 'designation', 'duration', 'responsibilities', 'sort_order'];

    protected $casts = [
        'responsibilities' => 'array',
    ];
}
