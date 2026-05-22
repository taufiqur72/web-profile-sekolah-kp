<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $pluralLabel = 'Kategori Berita';
    protected static ?string $navigationGroup = 'Berita Sekolah';
    protected static ?int    $navigationSort  = 2;
    protected static ?string $modelLabel = 'Kategori Berita';

    protected static bool $canCreateAnother = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Kategori')
                    ->description('Kelola informasi dasar kategori berita sekolah.')
                    ->icon('heroicon-m-information-circle')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                
                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug (URL Otomatis)')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->readOnly()
                                    ->helperText('Slug digunakan untuk alamat URL yang ramah SEO.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->weight('bold')
                    ->color('success')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('URL Slug')
                    ->icon('heroicon-m-link')
                    ->color('gray'),

                Tables\Columns\TextColumn::make('news_count')
                    ->label('Total Berita')
                    ->counts('news')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->color('info')
                    ->button(),
                Tables\Actions\EditAction::make()
                    ->label('Ubah')
                    ->color('warning')
                    ->button(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Kategori berhasil dihapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotificationTitle('Data kategori terpilih berhasil dihapus'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}