<?php

namespace App\Filament\Resources\Waitlists\Tables;

use App\Models\WaitlistedUser;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WaitlistsTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email')
                    ->label('Email address'),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'tenant' => 'success',
                        'landlord' => 'info',
                        'both' => 'warning',
                    }),
                TextColumn::make('number_of_properties')
                    ->label('Properties')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'gray',
                        '2-10' => 'info',
                        '10-50' => 'warning',
                        '50+' => 'danger',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                DeleteAction::make(),
            ])
            ->paginated(fn() => WaitlistedUser::all()->count() >= 20)
            ->paginationPageOptions([20, 50, 100])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
