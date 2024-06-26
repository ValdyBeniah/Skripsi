<?php

namespace Database\Seeders;

use App\Models\truk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrukSeeder extends Seeder
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
                'truk' => 'Fuso',
                'jumlah' => '20',
                'harga' => '1000000',
            ]
            ];

            foreach ($userData as $key => $val){
                truk::create($val);
            }
    }
}
