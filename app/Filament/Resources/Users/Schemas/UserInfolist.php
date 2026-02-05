<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\RoleEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->icon('heroicon-o-user'),
                        TextEntry::make('email')
                            ->label('Email address')
                            ->icon('heroicon-o-envelope')
                            ->copyable(),
                        TextEntry::make('roles.name')
                            ->label('Role')
                            ->badge()
                            ->formatStateUsing(fn(string $state): string => RoleEnum::tryFrom($state)?->getLabel() ?? $state)
                            ->color(fn(string $state): string => RoleEnum::tryFrom($state)?->getColor() ?? 'gray'),
                    ]),
                Section::make('Timestamps')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('email_verified_at')
                            ->label('Email verified')
                            ->since()
                            ->placeholder('Not verified'),
                        TextEntry::make('two_factor_confirmed_at')
                            ->label('Two-factor authentication')
                            ->since()
                            ->placeholder('Not enabled'),
                        TextEntry::make('created_at')
                            ->label('Joined')
                            ->since()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Last updated')
                            ->since()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
