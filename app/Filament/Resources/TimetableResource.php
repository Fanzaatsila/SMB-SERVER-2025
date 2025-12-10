<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableResource\Pages;
use App\Filament\Resources\TimetableResource\RelationManagers;
use App\Models\Timetable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\TimetableType;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Jadwal';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('files')
                    ->label('Berkas Jadwal')
                    ->required()
                    ->directory('timetable-files')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxSize(49152),
                Forms\Components\Select::make('timetable_type_id')
                    ->label("Jenis Jadwal")
                    ->required()
                    ->options(TimetableType::all()->pluck('type', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('files')
                    ->url(fn ($record) => "/storage/{$record->files}")
                    ->label('Berkas Jadwal')
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('timetableType.type')
                    ->searchable()
                    ->label("Jenis Jadwal"),
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
            'index' => Pages\ListTimetables::route('/'),
            'create' => Pages\CreateTimetable::route('/create'),
            'edit' => Pages\EditTimetable::route('/{record}/edit'),
        ];
    }
}
