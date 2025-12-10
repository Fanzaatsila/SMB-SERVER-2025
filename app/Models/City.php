<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function trainings(): HasMany {
        return $this->hasMany(Training::class);
    }

    public function activities(): HasMany {
        return $this->hasMany(Activity::class);
    }

    public function brochures(): HasMany {
        return $this->hasMany(Brochure::class);
    }
}
