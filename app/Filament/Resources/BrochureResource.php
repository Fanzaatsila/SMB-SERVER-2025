<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrochureResource\Pages;
use App\Filament\Resources\BrochureResource\RelationManagers;
use App\Models\Brochure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\City;

class BrochureResource extends Resource
{
    protected static ?string $model = Brochure::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Brosur';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->label("Judul"),
                Forms\Components\Radio::make('is_online')
                    ->options([
                        1 => 'Online',
                        0 => 'Offline',
                    ])
                    ->required()
                    ->label("Sifat Kegiatan")
                    ->default(1),
                Forms\Components\FileUpload::make('image')
                    ->label('Brosur')
                    ->required()
                    ->image()
                    ->directory('brochures')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxSize(3072),
                Forms\Components\Select::make('city_id')
                    ->label("Kota (opsional)")
                    ->options(City::all()->pluck('name', 'id'))
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function (Forms\Set $set, $state) {
                        if (empty($state)) {
                            $set('is_online', 1);
                        } else {
                            $set('is_online', 0);
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Judul Brosur"),
                Tables\Columns\TextColumn::make('is_online')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ? 'Online' : 'Offline')
                    ->label("Sifat Brosur"),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto Kegiatan')
                    ->disk('public'),
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
            'index' => Pages\ListBrochures::route('/'),
            'create' => Pages\CreateBrochure::route('/create'),
            'edit' => Pages\EditBrochure::route('/{record}/edit'),
        ];
    }
}
