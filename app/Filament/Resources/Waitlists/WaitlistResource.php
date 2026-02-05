<?php

namespace App\Filament\Resources\Waitlists;

use App\Filament\Resources\Waitlists\Schemas\WaitlistInfolist;
use App\Filament\Resources\Waitlists\Tables\WaitlistsTable;
use App\Models\WaitlistedUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WaitlistResource extends Resource
{
    protected static ?string $model = WaitlistedUser::class;

    protected static ?string $slug = 'waitlist';
    protected static ?string $navigationLabel = 'Waitlist';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    public static function infolist(Schema $schema): Schema
    {
        return WaitlistInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WaitlistsTable::table($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWaitlists::route('/'),
        ];
    }
}
