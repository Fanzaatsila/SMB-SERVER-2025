<?php

namespace App\Filament\Resources\CertificationTypeResource\Pages;

use App\Filament\Resources\CertificationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCertificationType extends EditRecord
{
    protected static string $resource = CertificationTypeResource::class;

    protected static ?string $title = 'Ubah Jenis Pelayanan';

    protected ?string $heading = 'Ubah Jenis Pelayanan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
