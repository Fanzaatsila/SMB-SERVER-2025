<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models;

class TimetableType extends Model
{
    protected $fillable = [
        'type',
    ];

    public function timetables(): HasMany {
        return $this->hasMany(Timetable::class);
    }
}
