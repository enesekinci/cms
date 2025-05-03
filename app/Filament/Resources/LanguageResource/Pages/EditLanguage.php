<?php

namespace App\Filament\Resources\LanguageResource\Pages;

use App\Filament\Resources\LanguageResource;
use App\Traits\Filament\HasBackUrl;
use Filament\Actions;
use Filament\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use App\Models\Language;

class EditLanguage extends EditRecord
{
    use HasBackUrl;

    protected static string $resource = LanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['is_default'])) {
            // Eğer bu dil varsayılan olarak işaretlendiyse, diğer tüm dillerin varsayılan durumunu kaldır
            if ($data['is_default']) {
                Language::where('id', '!=', $this->record->id)->update(['is_default' => false]);
            }
            // is_default değerini kaydet
            $this->record->update(['is_default' => $data['is_default']]);
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
