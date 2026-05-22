<?php

namespace App\Filament\Resources\AlumniResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class GalleriesRelationManager extends RelationManager
{
    protected static string $relationship = 'galleries';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image_galery')
                ->label('Foto Galeri')
                ->image()
                ->directory('alumni-galleries')
                // Menambahkan fitur multiple agar bisa pilih banyak gambar
                ->multiple()
                // Menambahkan fitur agar bisa upload langsung tanpa harus 
                // membuat baris satu per satu untuk setiap foto
                ->appendFiles()
                ->required(),
                
            Forms\Components\TextInput::make('caption')
                ->label('Caption (Opsional)'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_galery')
                    ->label('Foto')
                    // Jika multiple, tampilkan sebagai stack atau grid
                    ->stacked()
                    ->limit(3), 
                Tables\Columns\TextColumn::make('caption')->label('Caption'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Tambah Foto'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}