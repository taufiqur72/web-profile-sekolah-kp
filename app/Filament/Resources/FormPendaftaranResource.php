<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormPendaftaranResource\Pages;
use App\Models\FormPendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FormPendaftaranResource extends Resource
{
    protected static ?string $model = FormPendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Formulir SPMB';
    protected static ?string $navigationGroup = 'Formulir SPMB';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Formulir SPMB';

    // MEMBATASI AGAR TIDAK BISA BUAT DATA BARU JIKA SUDAH ADA 1
    public static function canCreate(): bool
    {
        return FormPendaftaran::count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konfigurasi PPDB')
                    ->description('Pengaturan tombol pendaftaran di halaman depan.')
                    ->schema([
                        Forms\Components\TextInput::make('link_pendaftaran')
                            ->label('Link Google Form')
                            ->placeholder('https://docs.google.com/forms/...')
                            ->url()
                            ->required(),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktifkan Tombol Pendaftaran')
                            ->default(true)
                            ->helperText('Jika dimatikan, tombol akan berubah menjadi pesan ditutup.'),
                        
                        Forms\Components\TextInput::make('pesan_tutup')
                            ->label('Pesan Tombol Pendaftaran')
                            ->placeholder('Pendaftaran Ditutup')
                            ->default('Pendaftaran Ditutup'),
                            
                        Forms\Components\TextInput::make('tahun_ajaran')
                            ->label('Tahun Ajaran')
                            ->placeholder('2026/2027'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_ajaran')->label('Tahun Ajaran')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('Status Aktif')->boolean(),
                Tables\Columns\TextColumn::make('link_pendaftaran')->label('Link')->limit(30),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                     ->color('warning'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Menonaktifkan bulk delete agar data tidak terhapus sengaja
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormPendaftarans::route('/'),
            'create' => Pages\CreateFormPendaftaran::route('/create'),
            'edit' => Pages\EditFormPendaftaran::route('/{record}/edit'),
        ];
    }
}