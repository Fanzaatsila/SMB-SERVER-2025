<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\Client;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

class BulkEditClients extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = ClientResource::class;

    protected static string $view = 'filament.resources.client-resource.pages.bulk-edit-clients';

    protected static ?string $title = 'Bulk Edit Klien';

    public Collection $records;

    public ?array $data = [];

    public function mount(string $records): void
    {
        $recordIds = explode(',', $records);
        $this->records = Client::whereIn('id', $recordIds)->get();

        if ($this->records->isEmpty()) {
            abort(404);
        }

        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Edit Multiple Klien')
                ->description('Pilih field yang ingin diupdate untuk ' . $this->records->count() . ' klien')
                ->schema([
                    Forms\Components\Toggle::make('update_name')
                        ->label('Update Perusahaan Klien')
                        ->reactive()
                        ->default(false),
                    Forms\Components\Textarea::make('name')
                        ->label("Perusahaan Klien")
                        ->autosize()
                        ->visible(fn (Forms\Get $get) => $get('update_name'))
                        ->required(fn (Forms\Get $get) => $get('update_name')),
                    Forms\Components\Toggle::make('update_image')
                        ->label('Update Logo Klien')
                        ->reactive()
                        ->default(false),
                    Forms\Components\FileUpload::make('image')
                        ->label('Logo Klien')
                        ->visible(fn (Forms\Get $get) => $get('update_image'))
                        ->required(fn (Forms\Get $get) => $get('update_image'))
                        ->image()
                        ->directory('client-images')
                        ->enableOpen()
                        ->enableDownload()
                        ->disk('public')
                        ->maxSize(3072),
                ]),
        ];
    }

    public function save(): void
    {
        $this->data = $this->form->getState();

        foreach ($this->records as $record) {
            $updates = [];

            if ($this->data['update_name'] ?? false) {
                $updates['name'] = $this->data['name'];
            }

            if ($this->data['update_image'] ?? false) {
                // Delete old image if exists
                if ($record->image && \Storage::disk('public')->exists($record->image)) {
                    \Storage::disk('public')->delete($record->image);
                }
                $updates['image'] = $this->data['image'];
            }

            if (!empty($updates)) {
                $record->update($updates);
            }
        }

        Notification::make()
            ->success()
            ->title('Berhasil!')
            ->body(count($this->records) . ' klien berhasil diupdate.')
            ->send();

        $this->redirect(ClientResource::getUrl());
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Simpan Perubahan')
                ->submit('save')
                ->color('success'),
            Actions\Action::make('cancel')
                ->label('Batal')
                ->url(ClientResource::getUrl())
                ->color('gray'),
        ];
    }
}
