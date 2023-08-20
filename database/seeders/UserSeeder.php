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
        //$fact = new UserFactory();
        //$fact->create();
        $users = [
            [
                'id' => 1,
                'name' => '',
                'email' => 'superadmin@laraveltuts.com',
                'password' => '',
            ],
            [
                'id' => 2,
                'name' => '',
                'email' => 'admin@laraveltuts.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]
        ];
    }
}
