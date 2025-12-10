<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationTypeResource\Pages;
use App\Filament\Resources\CertificationTypeResource\RelationManagers;
use App\Models\CertificationType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificationTypeResource extends Resource
{
    protected static ?string $model = CertificationType::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = 'Jenis Pelayanan';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255)
                    ->label("Jenis Pelayanan"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->label("Jenis Pelayanan"),
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
            'index' => Pages\ListCertificationTypes::route('/'),
            'create' => Pages\CreateCertificationType::route('/create'),
            'edit' => Pages\EditCertificationType::route('/{record}/edit'),
        ];
    }
}
