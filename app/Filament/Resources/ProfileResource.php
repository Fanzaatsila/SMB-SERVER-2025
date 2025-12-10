<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Profil Perusahaan';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Perusahaan"),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->autosize()
                    ->label("Tentang Perusahaan"),
                Forms\Components\FileUpload::make('hero_images')
                    ->label('Gambar Hero')
                    ->multiple()
                    ->required()
                    ->image()
                    ->directory('hero-images')
                    ->enableOpen()
                    ->enableDownload()
                    ->disk('public')
                    ->maxFiles(5)
                    ->maxSize(3072),
                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->autosize()
                    ->label("Visi"),
                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->autosize()
                    ->label("Misi"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label("Nama Perusahaan"),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->lineClamp(5)
                    ->label("Tentang Perusahaan"),
                Tables\Columns\ImageColumn::make('hero_images')
                    ->label('Gambar Hero')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('vision')
                    ->searchable()
                    ->lineClamp(5)
                    ->label("Visi"),
                Tables\Columns\TextColumn::make('mission')
                    ->searchable()
                    ->bulleted()
                    ->lineClamp(5)
                    ->label("Misi"),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        $theme = Profile::count();
        return $theme > 0 ? false : true;
    }
}
