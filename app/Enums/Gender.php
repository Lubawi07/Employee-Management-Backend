<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Gender: string implements HasLabel
{
    case MALE = 'Laki-laki';
    case FEMALE = 'Perempuan';

    public function getLabel(): string | Htmlable | null
    {
        return $this->name;
    }
}
