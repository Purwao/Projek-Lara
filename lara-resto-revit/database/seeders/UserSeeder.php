<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name'  => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'admin',
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'kasir',
            ],
            [
                'name' =>'managers',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'manager',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

