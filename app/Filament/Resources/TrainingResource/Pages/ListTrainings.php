<?php

namespace App\Filament\Resources\TrainingResource\Pages;

use App\Filament\Resources\TrainingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainings extends ListRecords
{
    protected static string $resource = TrainingResource::class;

    protected static ?string $title = 'Pelatihan';

    protected ?string $heading = 'Pelatihan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
