<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificationType extends Model
{
    protected $fillable = [
        'type',
    ];

    const REGULER = 3;

    public function certifications(): HasMany {
        return $this->hasMany(Certification::class);
    }
}
