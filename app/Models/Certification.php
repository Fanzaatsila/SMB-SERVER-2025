<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'description',
        'certification_type_id',
    ];

    public function certificationType(): BelongsTo {
        return $this->belongsTo(CertificationType::class);
    }
}
