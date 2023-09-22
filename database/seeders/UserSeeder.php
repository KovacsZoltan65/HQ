<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fact = new UserFactory();
        $fact->create();
        /*
        $password = 'password';
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make($password),
                'verified_at' => '2023-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Super Admin',
                'email' => 'superadmin@laraveltuts.com',
                'password' => Hash::make($password),
                'verified_at' => '2023-01-01 00:00:00',
            ],
            [
                'id' => 3,
                'name' => 'Admin User',
                'email' => 'admin@laraveltuts.com',
                'password' => Hash::make($password),
                'verified_at' => '2023-01-01 00:00:00',
            ],
            [
                'id' => 4,
                'name' => 'Example User',
                'email' => 'test@laraveltuts.com',
                'password' => Hash::make($password),
                'verified_at' => '2023-01-01 00:00:00',
            ]
        ];
        */
    }
}
