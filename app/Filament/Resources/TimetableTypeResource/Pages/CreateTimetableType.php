<?php

namespace App\Filament\Resources\TimetableTypeResource\Pages;

use App\Filament\Resources\TimetableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimetableType extends CreateRecord
{
    protected static string $resource = TimetableTypeResource::class;

    protected static ?string $title = 'Buat Jenis Jadwal';

    protected ?string $heading = 'Buat Jenis Jadwal';
}
