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
