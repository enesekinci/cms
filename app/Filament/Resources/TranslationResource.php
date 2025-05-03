<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TranslationResource\Pages;
use App\Filament\Resources\TranslationResource\RelationManagers;
use App\Models\Translation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TranslationResource extends Resource
{
    protected static ?string $model = Translation::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Ayarlar';
    protected static ?string $navigationLabel = 'Çeviriler';

    protected static ?string $label = 'Çeviri';
    protected static ?string $pluralLabel = 'Çeviriler';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('language_id')
                    ->label('Dil')
                    ->relationship('language', 'name')
                    ->required(),
                Forms\Components\TextInput::make('key')
                    ->label('Anahtar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')
                    ->label('Değer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('language.name')
                    ->label('Dil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('key')
                    ->label('Anahtar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Değer')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Güncellenme')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                /*Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif')
                    ->boolean(),*/
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
            'index' => Pages\ListTranslations::route('/'),
            'create' => Pages\CreateTranslation::route('/create'),
            'edit' => Pages\EditTranslation::route('/{record}/edit'),
        ];
    }
}
