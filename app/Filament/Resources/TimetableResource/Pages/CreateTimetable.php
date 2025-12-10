<?php

namespace App\Filament\Resources\TimetableResource\Pages;

use App\Filament\Resources\TimetableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimetable extends CreateRecord
{
    protected static string $resource = TimetableResource::class;

    protected static ?string $title = 'Buat Jadwal';

    protected ?string $heading = 'Buat Jadwal';
}
