<?php

namespace App\Filament\Resources\AgregateDhs2s\Pages;

use App\Filament\Resources\AgregateDhs2s\AgregateDhs2Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAgregateDhs2 extends EditRecord
{
    protected static string $resource = AgregateDhs2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
