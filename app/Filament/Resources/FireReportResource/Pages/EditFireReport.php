<?php

namespace App\Filament\Resources\FireReportResource\Pages;

use App\Filament\Resources\FireReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFireReport extends EditRecord
{
    protected static string $resource = FireReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
