<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingTypeResource\Pages;
use App\Filament\Resources\TrainingTypeResource\RelationManagers;
use App\Models\TrainingType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;

class TrainingTypeResource extends Resource
{
    protected static ?string $model = TrainingType::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Jenis Pelatihan';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255)
                    ->label("Jenis Pelatihan"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->label("ID"),
                Tables\Columns\TextColumn::make('type')
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
                            ->helperText('Upload file Excel (.xlsx atau .xls)')
                    ])
                    ->action(function (array $data) {
                        try {
                            $relativePath = $data['file'];
                            
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
                            
                            Excel::import(new \App\Imports\TrainingTypeImport(), $filePath);
                            
                            Notification::make()
                                ->title('Import berhasil!')
                                ->body('Data jenis pelatihan berhasil diimport dari Excel.')
                                ->success()
                                ->send();
                            
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
                    ->url(fn () => asset('templates/template_jenis_pelatihan.xlsx'))
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
            'index' => Pages\ListTrainingTypes::route('/'),
            'create' => Pages\CreateTrainingType::route('/create'),
            'edit' => Pages\EditTrainingType::route('/{record}/edit'),
        ];
    }
}
