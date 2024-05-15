<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2a$12$j7zr.Flx0SWqIWGyXJkrQ.xRS6M/DYc/2C1ZXlPn113FdL4v0k.WS',
                'user_type' => 'admin'
            ],

            [
                'name' => 'jowel rana',
                'email' => 'jowel@gmail.com',
                'password' => '$2a$12$j7zr.Flx0SWqIWGyXJkrQ.xRS6M/DYc/2C1ZXlPn113FdL4v0k.WS',
                'user_type' => 'user'
            ]
        ]);
    }
}
