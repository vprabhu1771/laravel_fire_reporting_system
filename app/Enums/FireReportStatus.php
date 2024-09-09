<?php

namespace App\Enums;

enum FireReportStatus: string
{
    case REQUEST_RECEIVED = 'Request Received';
    case TEAM_ON_THE_WAY = 'Team On the Way';
    case FIRE_RELIEF_WORK_IN_PROGRESS = 'Fire Relief Work in Progress';
    case REQUEST_COMPLETED = 'Request Completed';

    public static function getValues():array
    {
        return array_column(FireReportStatus::cases(), 'value');
    }

    public static function getKeyValues():array
    {
        return array_column(FireReportStatus::cases(), 'value','key');
    }
}