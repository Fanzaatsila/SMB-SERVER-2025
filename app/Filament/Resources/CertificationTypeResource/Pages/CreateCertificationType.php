<?php

namespace App\Filament\Resources\CertificationTypeResource\Pages;

use App\Filament\Resources\CertificationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCertificationType extends CreateRecord
{
    protected static string $resource = CertificationTypeResource::class;

    protected static ?string $title = 'Buat Jenis Pelayanan';

    protected ?string $heading = 'Buat Jenis Pelayanan';
}
