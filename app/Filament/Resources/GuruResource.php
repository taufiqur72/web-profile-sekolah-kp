<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    // Mengganti icon agar lebih relevan (User/Guru)
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Data Guru';

    protected static ?string $slug = 'data-guru';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Menggunakan Section untuk mengelompokkan input
                Section::make('Informasi Pribadi & Jabatan')
                    ->description('Lengkapi data profil guru di bawah ini.')
                    ->icon('heroicon-m-identification') // Icon di judul section
                    ->schema([
                        Grid::make(2) // Membuat tampilan 2 kolom
                            ->schema([
                                TextInput::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->placeholder('Contoh: Dr. Budi Utomo, M.Pd')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('jabatan')
                                    ->label('Jabatan')
                                    ->placeholder('Contoh: Kepala Sekolah / Guru Madya')
                                    ->required(),

                                TextInput::make('bidang_studi')
                                    ->label('Bidang Studi')
                                    ->placeholder('Contoh: Matematika / Bahasa Inggris')
                                    ->required(),

                                TextInput::make('label')
                                    ->label('Label Status')
                                    ->placeholder('Contoh: PNS / Honorer / Wali Kelas')
                                    ->helperText('Akan muncul sebagai badge di tabel.')
                                    ->required(),
                            ]),
                    ]),

                Section::make('Pas Foto')
                    ->description('Unggah foto resmi guru dengan latar belakang polos.')
                    ->schema([
                        FileUpload::make('foto')
                            ->label('Foto Guru')
                            ->image()
                            ->imageEditor() // Memberikan fitur crop gambar
                            ->avatar() // preview upload terlihat bulat
                            ->directory('guru-photo')
                            ->disk('public')
                            ->required()
                            ->maxSize(1024), // Maksimal 1MB
                    ])->collapsible(), // Section ini bisa di-collapse (buka-tutup)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->disk('public'),

                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight('bold') // Membuat teks tebal
                    ->description(fn (Guru $record): string => "ID: #{$record->id}"), // Sub-teks kecil di bawah nama

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->toggleable() // Kolom ini bisa disembunyikan oleh user
                    ->searchable(),

                TextColumn::make('bidang_studi')
                    ->label('Bidang Studi')
                    ->icon('heroicon-m-academic-cap') // Menambah icon di dalam kolom tabel
                    ->color('gray'),

                TextColumn::make('label')
                    ->label('Status')
                    ->badge() // Mengubah jadi bentuk badge
                    ->color(fn (string $state): string => match ($state) {
                        'PNS' => 'success',
                        'Honorer' => 'warning',
                        'Wali Kelas' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
            ])
            ->defaultSort('nama_lengkap', 'asc') // Urutan default
            ->filters([
                // Kamu bisa tambah filter di sini nanti
            ])
            ->actions([
                // Menggunakan Action Group agar UI lebih rapi jika banyak aksi
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
