<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Profile extends Model
{
    protected $fillable = [
        'title',
        'description',
        'hero_images',
        'vision',
        'mission',
    ];

    protected $casts = [
        'hero_images' => 'json',
    ];
}
