<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected static ?string $title = 'Kegiatan';

    protected ?string $heading = 'Kegiatan';

    public function mount(): void
    {
        parent::mount();

        Artisan::call('activities:sync-expired-trainings');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('syncFromTraining')
                ->label('Sync dari Training')
                ->icon('heroicon-o-arrow-path')
                ->color('gray')
                ->action(function () {
                    Artisan::call('activities:sync-expired-trainings');

                    Notification::make()
                        ->title('Sinkronisasi selesai')
                        ->body(trim(Artisan::output()))
                        ->success()
                        ->send();
                }),
            Actions\CreateAction::make(),
        ];
    }
}
