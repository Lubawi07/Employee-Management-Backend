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

        $attendanceTotal = attendances::count();
        $attendancesData = attendances::whereDate('check_in', '>=', now()->subWeek())->count();

        $leavesTotal = leaves::count();
        $leavesData = leaves::whereDate('created_at', '>=', now()->subWeek())->count();

        $employeesTotal = employees::count();
        $employeesData = employees::whereDate('user_id', '>=', now()->subWeek())->count();

        $postionsTotal = positions::count();
        $positionsData = positions::whereDate('created_at', '>=', now()->subWeek())->count();

        $departmentsTotal = departments::count();
        $departmentsData = departments::whereDate('created_at', '>=', now()->subWeek())->count();


        return [
            // attendance total
            Stat::make('Absen masuk', $attendanceTotal)
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon($attendancesData == 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
                ->descriptionColor($attendancesData == 0 ? 'danger' : 'success')
                ->description($attendancesData == 0 ? "Tidak ada data baru" : "{$attendancesData} data masuk"),
            // leave total
            Stat::make('Cuti/izin', $leavesTotal)
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon($leavesData == 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
                ->descriptionColor($leavesData == 0 ? 'danger' : 'success')
                ->description($leavesData == 0 ? "Tidak ada baru" : "{$leavesData} data masuk"),
            // employee total
            Stat::make('Total karyawan', $employeesTotal)
                ->icon(Heroicon::Users)
                ->descriptionIcon($employeesData == 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
                ->descriptionColor($employeesData == 0 ? 'danger' : 'success')
                ->description($employeesData == 0 ? "Tidak ada baru" : "{$employeesData} data masuk"),
            // position total
            Stat::make('Total posisi', $postionsTotal)
                ->icon(Heroicon::Briefcase)
                ->descriptionIcon($positionsData == 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
                ->descriptionColor($positionsData == 0 ? 'danger' : 'success')
                ->description($positionsData == 0 ? "Tidak ada baru" : "{$positionsData} data masuk"),
            // departement total
            Stat::make('Total departemen', $departmentsTotal)
                ->icon(Heroicon::BuildingOffice)
                ->descriptionIcon($departmentsData == 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
                ->descriptionColor($departmentsData == 0 ? 'danger' : 'success')
                ->description($departmentsData == 0 ? "Tidak ada baru" : "{$departmentsData} data masuk"),

        ];
    }

    protected function getColumns(): int|array
    {
        return 5; //Set widget in 5 items on 1 row
    }
}
