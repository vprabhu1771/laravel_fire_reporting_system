<?php

namespace App\Filament\Resources\FireReportResource\Pages;

use App\Filament\Resources\FireReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


use App\Enums\FireReportStatus;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;


class ListFireReports extends ListRecords
{
    protected static string $resource = FireReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Request Received' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', FireReportStatus::REQUEST_RECEIVED->value)),
            'Team On the Way' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', FireReportStatus::TEAM_ON_THE_WAY->value)),
            'Fire Relief Work in Progress' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', FireReportStatus::FIRE_RELIEF_WORK_IN_PROGRESS->value)),
            'Request Completed' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', FireReportStatus:: REQUEST_COMPLETED->value)),
        ];
    }
}
