<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Leaves: string implements HasLabel
{
    case SICK = 'Sakit';
    case PERMISSIONS = 'Izin';
    case EMERGANCY = 'Penting';

    public function getLabel(): string | Htmlable | null
    {
        return $this->name;
    }
}
