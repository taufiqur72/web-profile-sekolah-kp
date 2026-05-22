<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolProfileResource\Pages;
use App\Models\SchoolProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolProfileResource extends Resource
{
    protected static ?string $model = SchoolProfile::class;

    protected static bool $canCreateAnother = false;

    protected static ?string $navigationIcon  = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Profil Sekolah';
    protected static ?string $modelLabel      = 'Profil Sekolah';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int    $navigationSort  = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Kepala Sekolah')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nama_kepsek')
                        ->label('Nama Kepala Sekolah')
                        ->placeholder('H. Ahmad Fauzi, S.Pd., M.M.')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('label')
                        ->label('Jabatan / Label')
                        ->placeholder('Kepala Sekolah SMP Al Husainiyah')
                        ->maxLength(255),

                    Forms\Components\FileUpload::make('foto_profil')
                        ->label('Foto Kepala Sekolah')
                        ->image()
                        ->directory('school/kepsek')
                        ->imageCropAspectRatio('3:4')
                        ->imageResizeMode('cover')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Sambutan')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->schema([
                    Forms\Components\RichEditor::make('konten_sambutan')
                        ->label('Isi Sambutan')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'h2', 'h3',
                            'bulletList', 'orderedList',
                            'blockquote', 'link',
                            'undo', 'redo',
                        ]),
                ]),

            Forms\Components\Section::make('Sejarah Sekolah')
                ->icon('heroicon-o-book-open')
                ->schema([
                    Forms\Components\RichEditor::make('konten_sejarah')
                        ->label('Isi Sejarah')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'h2', 'h3',
                            'bulletList', 'orderedList',
                            'blockquote', 'link',
                            'undo', 'redo',
                        ]),
                ]),

            Forms\Components\Section::make('Visi & Misi')
                ->icon('heroicon-o-light-bulb')
                ->columns(2)
                ->schema([
                    Forms\Components\RichEditor::make('visi')
                        ->label('Visi')
                        ->toolbarButtons([
                            'bold', 'italic', 'blockquote',
                            'undo', 'redo',
                        ]),

                    Forms\Components\RichEditor::make('misi')
                        ->label('Misi')
                        ->helperText('Gunakan bullet list untuk poin-poin misi.')
                        ->toolbarButtons([
                            'bold', 'italic',
                            'bulletList', 'orderedList',
                            'undo', 'redo',
                        ]),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_profil')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama_kepsek')
                    ->label('Kepala Sekolah')
                    ->searchable(),

                Tables\Columns\TextColumn::make('label')
                    ->label('Jabatan'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // Tidak perlu bulk delete — tabel ini hanya punya 1 baris
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolProfiles::route('/'),
            'create' => Pages\CreateSchoolProfile::route('/create'),
            'edit'  => Pages\EditSchoolProfile::route('/{record}/edit'),
        ];
    }
}