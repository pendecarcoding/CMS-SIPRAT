<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KoperasiResource\Pages;
use App\Filament\Resources\KoperasiResource\RelationManagers;
use App\Models\Koperasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KoperasiResource extends Resource
{
    protected static ?string $model = Koperasi::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';
    protected static ?string $label = 'Koperasi';
    protected static ?string $pluralLabel = 'Koperasi';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Data Master';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_koperasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required(),
                Forms\Components\Select::make('desa_id')
                    ->relationship('desa', 'nama') // Assuming 'nama' is the column for the desa name
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name') // Assuming 'name' is the column for the user name
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nama_koperasi')->sortable()->searchable(),
            TextColumn::make('alamat')->sortable(),
            TextColumn::make('desa.nama')->label('Desa')->sortable(), // Change 'nama' to the correct column in desa
            TextColumn::make('user.name')->label('User')->sortable(), // Change 'name' to the correct column in user
            TextColumn::make('created_at')->dateTime()->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKoperasis::route('/'),
            'create' => Pages\CreateKoperasi::route('/create'),
            'edit' => Pages\EditKoperasi::route('/{record}/edit'),
        ];
    }
}
