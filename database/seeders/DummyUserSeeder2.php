<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyUserSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Supir01',
                'email' => 'supir01@gmail.com',
                'role' => 'supir',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(10),
            ],
            ];

            foreach ($userData as $key => $val){
                User::create($val);
            }
    }
}
