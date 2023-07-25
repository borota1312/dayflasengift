<?php

namespace Database\Seeders;

use App\Helpers\RoleHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder

{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'type' => RoleHelper::Admin,
                'password' => bcrypt('1234567890'),
            ],

        ];

        foreach ($users as $key => $user) {

            User::create($user);
        }
    }
}
