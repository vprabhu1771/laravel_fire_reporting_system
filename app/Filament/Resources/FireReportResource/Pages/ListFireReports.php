<?php

namespace App\Filament\Resources\FireReportResource\Pages;

use App\Filament\Resources\FireReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFireReports extends ListRecords
{
    protected static string $resource = FireReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
