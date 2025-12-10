<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\City;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Judul Kegiatan"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label("Deskripsi"),
                Forms\Components\Radio::make('is_online')
                    ->options([
                        1 => 'Online',
                        0 => 'Offline',
                    ])
                    ->required()
                    ->label("Sifat Kegiatan")
                    ->default(1),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto Kegiatan')
                    ->required()
                    ->image()
                    ->directory('activity-images')
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
                    ->label("Judul Kegiatan"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label("Deskripsi"),
                Tables\Columns\TextColumn::make('is_online')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ? 'Online' : 'Offline')
                    ->label("Sifat Kegiatan"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label("Deskripsi"),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
