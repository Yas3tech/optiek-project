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
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'eddouksy@gmail.com'],
            [
                'name' => 'Yassine Eddouks',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'test@ehb.be'],
            [
                'name' => 'test eddouks',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'test2@ehb.be'],
            [
                'name' => 'test2 eddouks',
                'password' => Hash::make('Password!321'),
                'is_admin' => false,
            ]
        );
    }
}
