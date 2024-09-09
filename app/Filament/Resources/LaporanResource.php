<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Filament\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use App\Models\Koperasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\Column;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;

    protected static ?string $navigationIcon = 'heroicon-s-folder';
    protected static ?string $label = 'Laporan';
    protected static ?string $pluralLabel = 'Laporan';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('judul')
                ->required()
                ->maxLength(255),
            DatePicker::make('tanggal')
                ->required(),
            FileUpload::make('file')
                ->required()
                ->disk('public') // or another disk if necessary
                ->directory('files')
                ->maxSize(10240) // Max file size in kilobytes
                ->acceptedFileTypes(['application/pdf', 'image/*']), // Adjust file types as needed

                PdfViewerField::make('file')
                ->label('View the PDF')
                ->minHeight('40svh'),
            Hidden::make('id_koperasi')
                ->default(fn () => Auth::user()->koperasis()->pluck('id')->first()), // Automatically set id_koperasi
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->query(
            Laporan::where('id_koperasi', Auth::user()->koperasis()->pluck('id')->first())
        )
        ->columns([
            TextColumn::make('id'),
            TextColumn::make('judul'),
            TextColumn::make('koperasi.nama_koperasi')->label('Koperasi'),
            TextColumn::make('tanggal')->date(),
            TextColumn::make('file')
                ->label('File')
                ->formatStateUsing(fn ($state) => $state ? basename($state) : 'No file')
                ->limit(50), // Optional, limits the length of the displayed text
            TextColumn::make('created_at')->dateTime(),
            TextColumn::make('updated_at')->dateTime(),
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

   
    public static function edit(EditRecord $page): EditRecord
    {
        return $page;
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
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
