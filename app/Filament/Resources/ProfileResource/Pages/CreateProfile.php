<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected static ?string $title = 'Buat Profil Perusahaan';

    protected ?string $heading = 'Buat Profil Perusahaan';
}
