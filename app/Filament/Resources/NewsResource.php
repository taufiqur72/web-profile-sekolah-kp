<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Daftar Berita';
    protected static ?string $pluralLabel = 'Berita';
    protected static ?string $navigationGroup = 'Berita Sekolah';
    protected static ?int    $navigationSort  = 2;

    protected static ?string $modelLabel = 'Berita';

    protected static bool $canCreateAnother = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Berita')
                    ->description('Tulis dan kelola isi berita Anda di sini.')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\DatePicker::make('posted_at')
                                    ->label('Tanggal Terbit')
                                    ->required()
                                    ->default(now()),
                            ]),

                        // Kita tambahkan TextInput untuk Judul (tidak tersimpan di DB jika tidak ada kolomnya)
                        // Tapi digunakan untuk men-generate slug secara otomatis
                        Forms\Components\TextInput::make('title_temp')
                            ->label('Judul Berita')
                            ->placeholder('Masukkan judul berita...')
                            ->required()
                            // Logika Otomatis: Saat judul diketik, slug di bawah akan berubah
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->dehydrated(false), // Agar field ini tidak dikirim ke database

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->readOnly() // Membuat inputan ini tidak bisa diedit manual
                            ->helperText('Slug akan terisi otomatis berdasarkan judul di atas.'),

                        Forms\Components\RichEditor::make('news_content')
                            ->label('Isi Berita')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('news-images')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug / Judul')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('posted_at')
                    ->label('Tgl Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('posted_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat')->color('info')->button(),
                Tables\Actions\EditAction::make()->label('Ubah')->color('warning')->button(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Berita berhasil dihapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Berita terpilih berhasil dihapus'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}