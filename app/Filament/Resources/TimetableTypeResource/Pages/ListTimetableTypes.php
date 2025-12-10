<?php

namespace App\Filament\Resources\TimetableTypeResource\Pages;

use App\Filament\Resources\TimetableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimetableTypes extends ListRecords
{
    protected static string $resource = TimetableTypeResource::class;

    protected static ?string $title = 'Jenis Jadwal';

    protected ?string $heading = 'Jenis Jadwal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
