<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource\RelationManagers;
use App\Models\Certification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\CertificationType;

class CertificationResource extends Resource
{
    protected static ?string $model = Certification::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = 'Pelayanan';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Pelayanan"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label("Deskripsi"),
                Forms\Components\Select::make('certification_type_id')
                    ->label("Jenis Pelayanan")
                    ->required()
                    ->options(CertificationType::all()->pluck('type', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Pelayanan"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label("Deskripsi"),
                Tables\Columns\TextColumn::make('certificationType.type')
                    ->searchable()
                    ->label("Jenis Pelayanan"),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('certificationType.type')
                    ->label('Jenis Sertifikasi')
                    ->options([
                        'Reguler' => 'Reguler',
                        'Sertifikasi' => 'Sertifikasi',
                        'Non Sertifikasi' => 'Non Sertifikasi',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        return $query->whereHas('certificationType', function ($query) use ($data) {
                            $query->where('type', $data['value']);
                        });
                    }),
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
            'index' => Pages\ListCertifications::route('/'),
            'create' => Pages\CreateCertification::route('/create'),
            'edit' => Pages\EditCertification::route('/{record}/edit'),
        ];
    }
}
