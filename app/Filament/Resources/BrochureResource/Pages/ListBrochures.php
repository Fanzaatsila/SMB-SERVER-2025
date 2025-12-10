<?php

namespace App\Filament\Resources\BrochureResource\Pages;

use App\Filament\Resources\BrochureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrochures extends ListRecords
{
    protected static string $resource = BrochureResource::class;

    protected static ?string $title = 'Brosur';

    protected ?string $heading = 'Brosur';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
