<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'phone' => '081253434545',
            'password' => bcrypt('1234567890'),
        ])->assignRole('admin');

        $penguji = User::create([
            'name' => 'Penguji',
            'email' => 'penguji@gmail.com',
            'email_verified_at' => now(),
            'phone' => '083345454545',
            'password' => bcrypt('1234567890'),
        ])->assignRole('penguji');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'phone' => '088965434545',
            'password' => bcrypt('1234567890'),
        ])->assignRole('user');
    }
}
