<?php

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertifications extends ListRecords
{
    protected static string $resource = CertificationResource::class;

    protected static ?string $title = 'Pelayanan';

    protected ?string $heading = 'Pelayanan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
