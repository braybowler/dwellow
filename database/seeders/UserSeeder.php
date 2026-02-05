<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@example.com',
        ])->assignRole(RoleEnum::SUPER_ADMIN_ROLE);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole(RoleEnum::ADMIN_ROLE);

        User::factory()->create([
            'name' => 'Tenant',
            'email' => 'tenant@example.com',
        ])->assignRole(RoleEnum::TENANT_ROLE);
    }
}
