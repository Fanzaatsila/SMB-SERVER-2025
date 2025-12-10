<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class Training extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'training_type_id',
        'city_id',
    ];

    public function trainingType(): BelongsTo {
        return $this->belongsTo(TrainingType::class);
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }
}
