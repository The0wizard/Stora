<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Admin User
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@stora.com',
        'password' => Hash::make('a12345678'), // You can change the password
        'role' => 'admin',
    ]);

    // Normal User
    User::create([
        'name' => 'Normal User',
        'email' => 'user@stora.com',
        'password' => Hash::make('12345678'),
        'role' => 'user',
    ]);
    }
}
