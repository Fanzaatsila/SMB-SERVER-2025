<?php

namespace App\Filament\Resources\BrochureResource\Pages;

use App\Filament\Resources\BrochureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrochure extends EditRecord
{
    protected static string $resource = BrochureResource::class;

    protected static ?string $title = 'Ubah Kegiatan';

    protected ?string $heading = 'Ubah Kegiatan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
