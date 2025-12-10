<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableTypeResource\Pages;
use App\Filament\Resources\TimetableTypeResource\RelationManagers;
use App\Models\TimetableType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetableTypeResource extends Resource
{
    protected static ?string $model = TimetableType::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    protected static ?string $navigationLabel = 'Jenis Jadwal';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255)
                    ->label("Jenis Jadwal"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListTimetableTypes::route('/'),
            'create' => Pages\CreateTimetableType::route('/create'),
            'edit' => Pages\EditTimetableType::route('/{record}/edit'),
        ];
    }
}
