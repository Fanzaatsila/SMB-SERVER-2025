<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Admin';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label("Nama Lengkap"),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255)
                    ->label("Alamat Email"),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->maxLength(255)
                    ->password()
                    ->revealable()
                    ->label("Kata Sandi"),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(15)
                    ->numeric()
                    ->prefix("+62")
                    ->label("Nomor Telepon"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label("Nama Lengkap"),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label("Alamat Email"),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label("Nomor Telepon"),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
