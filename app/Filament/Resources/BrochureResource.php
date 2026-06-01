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
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

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
                Forms\Components\DatePicker::make('start_date')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->label("Tanggal Awal"),
                Forms\Components\DatePicker::make('end_date')
                    ->format('Y-m-d')
                    ->displayFormat('Y-m-d')
                    ->native(false)
                    ->label("Tanggal Akhir"),
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
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
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
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->label("Tanggal Awal"),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->label("Tanggal Akhir"),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto Kegiatan')
                    ->disk('public'),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Status')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('toggle')
                    ->label(fn (Brochure $record) => $record->is_active ? 'Nonaktifkan' : 'Aktifkan')
                    ->icon(fn (Brochure $record) => $record->is_active ? 'heroicon-o-x-mark' : 'heroicon-o-check-mark')
                    ->color(fn (Brochure $record) => $record->is_active ? 'danger' : 'success')
                    ->action(fn (Brochure $record) => $record->update(['is_active' => !$record->is_active])),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    BulkAction::make('activate')
                        ->label('Aktifkan')
                        ->icon('heroicon-o-check-mark')
                        ->color('success')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => true])),
                    BulkAction::make('deactivate')
                        ->label('Nonaktifkan')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => false])),
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
