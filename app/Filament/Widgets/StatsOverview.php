<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Admin', \App\Models\User::count())
                ->description('Total admin yang terdaftar di sistem.')
                ->descriptionIcon('heroicon-m-user-group'),
            Stat::make('Total Kota', \App\Models\City::count())
                ->description('Total kota yang terdata di sistem.')
                ->descriptionIcon('heroicon-m-map-pin'),
            Stat::make('Total Pelatihan', \App\Models\Training::count())
                ->description('Total pelatihan yang terdata di sistem.')
                ->descriptionIcon('heroicon-m-rocket-launch'),
            Stat::make('Total Klien', \App\Models\Client::count())
                ->description('Total klien yang terdata di sistem.')
                ->descriptionIcon('heroicon-m-briefcase'),
            Stat::make('Total Pelayanan', \App\Models\Certification::count())
                ->description('Total pelayanan yang terdata di sistem.')
                ->descriptionIcon('heroicon-m-gift'),
            Stat::make('Total Jadwal', \App\Models\Timetable::count())
                ->description('Total jadwal yang terdata di sistem.')
                ->descriptionIcon('heroicon-m-clock'),
        ];
    }
}
