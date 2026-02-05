<?php

namespace Database\Seeders;

use App\Models\WaitlistedUser;
use Illuminate\Database\Seeder;

class WaitlistedUserSeeder extends Seeder
{
    public function run(): void
    {
        WaitlistedUser::factory()
            ->count(10)
            ->create();
    }
}
