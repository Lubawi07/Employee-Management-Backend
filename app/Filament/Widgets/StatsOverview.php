<?php

namespace App\Filament\Widgets;

use App\Models\attendances;
use App\Models\departments;
use App\Models\employees;
use App\Models\leaves;
use App\Models\positions;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Absen masuk', attendances::count())
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(attendances::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Absen keluar', leaves::count())
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(leaves::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Total karyawan', employees::count())
                ->icon(Heroicon::Users)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(employees::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Total departemen', departments::count())
                ->icon(Heroicon::BuildingOffice)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(departments::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
            Stat::make('Total posisi', positions::count())
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->descriptionColor('success')
                ->description(positions::whereDate('created_at', '>=', now()->subWeek())->count() . ' new this week'),
        ];
    }
}
