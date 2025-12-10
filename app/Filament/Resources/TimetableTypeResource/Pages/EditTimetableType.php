<?php

namespace App\Filament\Resources\TimetableTypeResource\Pages;

use App\Filament\Resources\TimetableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimetableType extends EditRecord
{
    protected static string $resource = TimetableTypeResource::class;

    protected static ?string $title = 'Ubah Jenis Jadwal';

    protected ?string $heading = 'Ubah Jenis Jadwal';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
