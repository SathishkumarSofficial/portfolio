<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'technologies',
        'live_link',
        'github_link',
        'features',
        'sort_order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'features' => 'array'
    ];
}
