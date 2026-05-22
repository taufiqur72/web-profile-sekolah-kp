<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers\GalleriesRelationManager;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Angkatan')
                    ->schema([
                        Forms\Components\TextInput::make('nama_angkatan')->required(),
                        Forms\Components\FileUpload::make('thumbnail_photos')
                            ->image()
                            ->directory('alumni-thumbnails')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_angkatan'),
                Tables\Columns\ImageColumn::make('thumbnail_photos'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            GalleriesRelationManager::class, // Menampilkan galeri di bawah form utama
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}