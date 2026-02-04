<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
        ]);

        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $testUser->assignRole('tenant');

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $adminUser->assignRole('admin');

        $superAdminUser = User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $superAdminUser->assignRole('super_admin');
    }
}
