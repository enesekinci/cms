<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    protected static ?string $navigationGroup = 'Ayarlar';

    protected static ?string $navigationLabel = 'Diller';

    protected static ?string $label = 'Dil';

    protected static ?string $pluralLabel = 'Diller';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Dil')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->label('Kod')
                    ->required()
                    ->maxLength(2),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Forms\Components\Toggle::make('is_default')
                    ->label('Varsayılan')
                    ->default(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Ad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Kod')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_default')
                    ->label('Varsayılan')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-check')
                    ->offIcon('heroicon-m-x-mark')
                    ->updateStateUsing(function (Model $record, $state) {
                        if ($record->is_default && !$state) {
                            return true;
                        }

                        if ($state) {
                            Language::where('id', $record->id)->update(['is_default' => true]);
                            Language::where('id', '!=', $record->id)->update(['is_default' => false]);
                        }

                        return $state;
                    })
                    ->default(function (Model $record) {
                        return $record->is_default;
                    }),
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make('edit')->label('Düzenle')->icon('heroicon-o-pencil'),
                Tables\Actions\DeleteAction::make()
                    ->label('Sil')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->action(function (Model $record) {
                        if($record->is_default) {
                            Notification::make()
                                ->title('Varsayılan dili silemezsiniz.')
                                ->danger()
                                ->send();
                            return;
                        }

                        $record->delete();

                        Notification::make()
                            ->title('Dil başarıyla silindi.')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListLanguages::route('/'),
            'create' => Pages\CreateLanguage::route('/create'),
            'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }
}
