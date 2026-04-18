<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'first_name' => 'Admin',
                'last_name'  => 'Account',
                'address'   => 'Admin Address',
                'phone'   => '09123456789',
                'birthday' => '2000-01-01',
                'password'  => Hash::make('password'),
                'role'      => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'first_name' => 'Regular',
                'last_name'  => 'User',
                'address'   => 'User Address',
                'phone'   => '09987654321',
                'birthday' => '2000-01-01',
                'password'  => Hash::make('password'),
                'role'      => 'user',
            ]
        );

        $this->call(AnimalSeeder::class);
    }
}