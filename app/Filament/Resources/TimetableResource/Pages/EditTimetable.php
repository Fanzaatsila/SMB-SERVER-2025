<?php

namespace App\Filament\Resources\TimetableResource\Pages;

use App\Filament\Resources\TimetableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimetable extends EditRecord
{
    protected static string $resource = TimetableResource::class;

    protected static ?string $title = 'Ubah Jadwal';

    protected ?string $heading = 'Ubah Jadwal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
