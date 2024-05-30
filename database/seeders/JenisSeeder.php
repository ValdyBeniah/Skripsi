<?php

namespace Database\Seeders;

use App\Models\jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
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
                'jenis' => 'Bahan baku',
                'harga' => '150',
            ],
            [
                'jenis' => 'Barang berat',
                'harga' => '350',
            ],
            [
                'jenis' => 'Barang fragile',
                'harga' => '400',
            ]
            ];

            foreach ($userData as $key => $val){
                jenis::create($val);
            }
    }
}
