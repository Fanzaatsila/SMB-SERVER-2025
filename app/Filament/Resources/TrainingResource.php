<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingResource\Pages;
use App\Filament\Resources\TrainingResource\RelationManagers;
use App\Models\Training;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\City;
use App\Models\TrainingType;
use App\Imports\TrainingImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class TrainingResource extends Resource
{
    protected static ?string $model = Training::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationLabel = 'Pelatihan';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Pelatihan"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label("Deskripsi"),
                Forms\Components\DatePicker::make('start_date')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Awal"),
                Forms\Components\DatePicker::make('end_date')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->required()
                    ->label("Tanggal Akhir"),
                Forms\Components\Select::make('city_id')
                    ->label("Kota")
                    ->required()
                    ->options(City::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('training_type_id')
                    ->label("Jenis Pelatihan")
                    ->required()
                    ->options(TrainingType::all()->pluck('type', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Pelatihan"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label("Deskripsi"),
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->label("Tanggal Awal"),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->label("Tanggal Akhir"),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->label("Kota"),
                Tables\Columns\TextColumn::make('trainingType.type')
                    ->searchable()
                    ->label("Jenis Pelatihan"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('importExcel')
                    ->label('Import Excel')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->form([
                        Forms\Components\FileUpload::make('file')
                            ->label('File Excel')
                            ->disk('local')
                            ->directory('imports')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel', 'text/csv'])
                            ->required()
                            ->helperText('Upload file Excel (.xlsx atau .xls) - Format tanggal: YYYY-MM-DD (contoh: 2026-01-06)')
                    ])
                    ->action(function (array $data) {
                        try {
                            // Filament saves to private disk by default
                            // Path format: private/imports/filename.xlsx
                            $relativePath = $data['file'];
                            
                            // Try multiple possible paths
                            $possiblePaths = [
                                storage_path('app/' . $relativePath),
                                storage_path('app/private/' . str_replace('imports/', '', $relativePath)),
                                storage_path('app/private/imports/' . basename($relativePath)),
                            ];
                            
                            $filePath = null;
                            foreach ($possiblePaths as $path) {
                                if (file_exists($path)) {
                                    $filePath = $path;
                                    break;
                                }
                            }
                            
                            if (!$filePath) {
                                Notification::make()
                                    ->title('File tidak ditemukan')
                                    ->body('Coba upload ulang file Excel Anda.')
                                    ->danger()
                                    ->send();
                                return;
                            }
                            
                            $import = new TrainingImport();
                            Excel::import($import, $filePath);
                            
                            $failures = $import->failures();
                            
                            if ($failures->isNotEmpty()) {
                                $errorMessages = [];
                                foreach ($failures as $failure) {
                                    $errorMessages[] = "Baris {$failure->row()}: " . implode(', ', $failure->errors());
                                }
                                
                                Notification::make()
                                    ->title('Import selesai dengan error')
                                    ->body('Beberapa baris gagal diimport: ' . implode(' | ', array_slice($errorMessages, 0, 3)))
                                    ->warning()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title('Import berhasil!')
                                    ->body('Data pelatihan berhasil diimport dari Excel.')
                                    ->success()
                                    ->send();
                            }
                            
                            // Clean up uploaded file
                            if (file_exists($filePath)) {
                                @unlink($filePath);
                            }
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Import gagal')
                                ->body('Error: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
                Tables\Actions\Action::make('downloadTemplate')
                    ->label('Download Template')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(fn () => asset('templates/template_pelatihan.xlsx'))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainings::route('/'),
            'create' => Pages\CreateTraining::route('/create'),
            'edit' => Pages\EditTraining::route('/{record}/edit'),
        ];
    }
}
