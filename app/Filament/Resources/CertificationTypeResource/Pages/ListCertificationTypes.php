<?php

namespace App\Filament\Resources\CertificationTypeResource\Pages;

use App\Filament\Resources\CertificationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificationTypes extends ListRecords
{
    protected static string $resource = CertificationTypeResource::class;

    protected static ?string $title = 'Jenis Pelayanan';

    protected ?string $heading = 'Jenis Pelayanan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
