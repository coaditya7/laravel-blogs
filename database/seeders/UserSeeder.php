<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'           => 'admin',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('admin123'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
