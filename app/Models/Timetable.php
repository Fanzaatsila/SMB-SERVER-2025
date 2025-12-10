<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class Timetable extends Model
{
    protected $table = 'timetable_files';

    protected $fillable = [
        'files',
        'timetable_type_id',
    ];

    protected $casts = [
        'files' => 'json',
    ];

    public function timetableType(): BelongsTo {
        return $this->belongsTo(TimetableType::class);
    }
}
