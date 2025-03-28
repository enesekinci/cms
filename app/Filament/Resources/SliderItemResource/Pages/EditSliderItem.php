<?php

namespace App\Filament\Resources\SliderItemResource\Pages;

use App\Filament\Resources\SliderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSliderItem extends EditRecord
{
    protected static string $resource = SliderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
