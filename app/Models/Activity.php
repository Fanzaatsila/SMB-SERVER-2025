<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_online',
        'city_id',
    ];

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }
}
