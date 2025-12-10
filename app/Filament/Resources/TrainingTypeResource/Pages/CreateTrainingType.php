<?php

namespace App\Filament\Resources\TrainingTypeResource\Pages;

use App\Filament\Resources\TrainingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrainingType extends CreateRecord
{
    protected static string $resource = TrainingTypeResource::class;

    protected static ?string $title = 'Buat Jenis Pelatihan';

    protected ?string $heading = 'Buat Jenis Pelatihan';
}
