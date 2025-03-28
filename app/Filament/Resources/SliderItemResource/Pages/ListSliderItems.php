<?php

namespace App\Filament\Resources\SliderItemResource\Pages;

use App\Filament\Resources\SliderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderItems extends ListRecords
{
    protected static string $resource = SliderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
