<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class TrainingType extends Model
{
    protected $fillable = [
        'type',
    ];

    public function trainings(): HasMany {
        return $this->hasMany(Training::class);
    }
}
