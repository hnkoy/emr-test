<?php

namespace App\Filament\Resources\AgregateDhs2s\Pages;

use App\Filament\Resources\AgregateDhs2s\AgregateDhs2Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgregateDhs2s extends ListRecords
{
    protected static string $resource = AgregateDhs2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
