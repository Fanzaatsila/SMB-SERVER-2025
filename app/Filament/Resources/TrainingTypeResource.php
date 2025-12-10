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
