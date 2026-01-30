<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Status: string implements HasLabel
{
    case APRROVED = 'Disetujui'; //Disetujui
    // case PENDING = 'Pending'; //Masih dikacangin
    case REJECTED = 'Ditolak'; //Ditolak

    public function getLabel(): string | Htmlable | null
    {
        return $this->name;
    }
}
