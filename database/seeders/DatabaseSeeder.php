<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin User
        User::create([
            'name' => 'Admin Organisasi',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'api_token' => 'admin-secret-token',
        ]);

        // Seed Operator User
        User::create([
            'name' => 'Operator Staf',
            'email' => 'operator@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'operator',
            'api_token' => 'operator-secret-token',
        ]);

        // Seed Superadmin User
        User::create([
            'name' => 'Superadmin Utama',
            'email' => 'superadmin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'superadmin',
            'api_token' => 'superadmin-secret-token',
        ]);
    }
}
