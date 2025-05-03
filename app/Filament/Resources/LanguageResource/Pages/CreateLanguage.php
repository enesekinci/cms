<?php

namespace App\Filament\Resources\LanguageResource\Pages;

use App\Filament\Resources\LanguageResource;
use App\Models\Translation;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateLanguage extends CreateRecord
{
    protected static string $resource = LanguageResource::class;

    protected function afterCreate(): void
    {
//        $translations = Translation::all();

        $newLanguageCode = $this->record->code;

//        foreach ($translations as $translation) {
//            $text = $translation->text ?? [];
//
            // Add new language to the text array if it doesn't exist
//            if (!isset($text[$newLanguageCode])) {
//                $text[$newLanguageCode] = '';
//                $translation->text = $text;
//                $translation->save();
//            }
//        }

        //bunu pgsql json ile tek sql sorgusunda yapabilirsin
        Translation::query()
            ->update([
                'text' => DB::raw("jsonb_set(text, $newLanguageCode, '\"\"', true)")
            ]);

        Notification::make()
            ->title('Yeni dil tüm çevirilere eklendi.')
            ->success()
            ->send();
    }
}
