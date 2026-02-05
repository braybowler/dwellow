<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum RoleEnum: string implements HasLabel, HasColor
{
    case SUPER_ADMIN_ROLE = 'super_admin';
    case ADMIN_ROLE = 'admin';
    case TENANT_ROLE = 'tenant';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SUPER_ADMIN_ROLE => 'danger',
            self::ADMIN_ROLE => 'success',
            self::TENANT_ROLE => 'warning',
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::SUPER_ADMIN_ROLE => 'Super Admin',
            self::ADMIN_ROLE => 'Admin',
            self::TENANT_ROLE => 'Tenant',
        };
    }
}
