<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin01',
                'email' => 'admin01@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Gudang01',
                'email' => 'gudang01@gmail.com',
                'role' => 'gudang',
                'password' => bcrypt('12345')
            ]
            ];

            foreach ($userData as $key => $val){
                User::create($val);
            }
    }
}
