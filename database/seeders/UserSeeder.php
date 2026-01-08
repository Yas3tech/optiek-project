<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'phone' => '021234567',
                'birthday' => '1985-01-01',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'eddouksy@gmail.com'],
            [
                'name' => 'Yassine Eddouks',
                'username' => 'yassine_e',
                'phone' => '0470123456',
                'birthday' => '1998-05-20',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@ehb.be'],
            [
                'name' => 'Test Gebruiker',
                'username' => 'test_user',
                'phone' => '0480987654',
                'birthday' => '2000-10-15',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'test2@ehb.be'],
            [
                'name' => 'Demo Klant',
                'username' => 'demo_klant',
                'phone' => '0490112233',
                'birthday' => '1992-12-25',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );
    }
}
