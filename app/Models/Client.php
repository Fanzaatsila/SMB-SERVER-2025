<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Client extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];
}
