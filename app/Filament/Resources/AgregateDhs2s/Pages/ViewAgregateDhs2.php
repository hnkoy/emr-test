<?php

namespace App\Filament\Resources\AgregateDhs2s\Pages;

use App\Filament\Resources\AgregateDhs2s\AgregateDhs2Resource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAgregateDhs2 extends ViewRecord
{
    protected static string $resource = AgregateDhs2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
