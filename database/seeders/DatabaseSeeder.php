<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@example.com',
                'full_name' => 'Admin User',
                'password' => Hash::make('admin123'),
                'score' => null,
                'otp' => null,
            ],
            [
                'email' => 'test@example.com',
                'full_name' => 'Test User',
                'password' => Hash::make('test123'),
                'score' => 85.5,
                'otp' => null,
            ],
            [
                'email' => 'user1@example.com',
                'full_name' => 'User One',
                'password' => Hash::make('user123'),
                'score' => 90.0,
                'otp' => null,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}