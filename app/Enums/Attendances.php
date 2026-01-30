<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Attendances: string implements HasLabel
{
    // Set by time
    case PRESENT = 'Hadir'; //Hadir tepat waktu
    case LATE = 'Telat'; //Telat dari batas waktu
    case ON_LEAVE = 'Izin'; //Tidak dapat hadir/absen karena ada keperluan
    case ABSENT = 'Alpa'; //Tidak ada kabar sama sekali


    public function getLabel(): string|Htmlable|null
    {
        return $this->name;
    }
}
